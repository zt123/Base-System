<?php
/**
 * @author wanthings.com chengx nixgnehc@gmail.com
 * Low level access control,general web site can useing.
 */
class Manager extends CActiveRecord
{
    const ADD_ERROR_USING_NAME = -1;
    const ERROR_NOT_FIND = -2;
    const EXECUTE_SUCCESS = 1;

    CONST MAN_STATUS_NORMAL = 1;
    CONST MAN_STATUS_DISABLE = 2;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '{{manager}}';
    }

    /**
     * 返回超级管理员 Id
     * @return [type] [description]
     */
    public function superManagerId()
    {
        return 1;
    }

    public function myEdit($arr)
    {
        $result = false;
        $manager = $this->getById($arr['id']);
        if (!empty($manager)) {
            $manager->mobile = $arr['mobile'];
            $result = $manager->save();
        }
        return $result;
    }
    /**
     * 获取特殊权限列表
     * @return [type] [description]
     */
    public function sp()
    {
        return array('manager' => '平台账号管理', 'system' => '系统设置');
    }

    public function getArrByAttributes($arr)
    {
        $result = array();
        $tmp = $this->getByAttributes($arr);
        if (!empty($tmp)) {
            $result = $tmp->attributes;
        }
        return $result;
    }
    /**
     * 自动注册admin
     * @return [type] [description]
     */
    public function registerAdmin($loginForm)
    {
        $admin = $this->getByAttributes(array('name' => 'admin'));
        if (empty($admin)) {
            if ($loginForm['name'] == 'admin' && $loginForm['pass'] == 'wanthings') {
                $this->addManager(array('name' => 'admin', 'sp' => array('manager', 'system'), 'passwd' => $loginForm['pass']));
            }
        }
    }

    public function addManager($arr)
    {
        $id = 0;
        if (!$this->isUsingName($arr['name'])) {
            $this->setIsNewRecord(true);
            $this->name = $arr['name'];
            if (!empty($arr['mobile'])) {
                $this->mobile = $arr['mobile'];
            }
            if (!empty($arr['passwd'])) {
                $this->passwd = McryptComponent::encryption($arr['passwd']);
            } else {
                $this->passwd = McryptComponent::encryption('123456');
            }
            $this->is_deleted = 0;
            $this->status = self::MAN_STATUS_NORMAL;
            if (!empty($arr['sp'])) {
                $this->sp = CJSON::encode($arr['sp']);
            } else {
                $this->sp = '';
            }
            
            if ($this->save()) {
                $id = $this->id;
            }
        } else {
            $id = self::ADD_ERROR_USING_NAME;
        }
        return $id;
    }

    public function edit($arr)
    {
        $status = false;
        $manager = $this->getById($arr['id']);
        if (!empty($manager)) {
            $sp = array();
            if (!empty($arr['mobile'])) {
                $manager->mobile = $arr['mobile'];
            }
            if ($manager->id == $this->superManagerId()) {
                $sp = array_keys($this->sp());
            } else {
                if (!empty($arr['sp'])) {
                    $sp = $arr['sp'];
                }
            }
            $manager->sp = CJSON::encode($sp);
            $status = $manager->save();
        }
        return $status;
    }

    /**
     * 修改密码
     */
    public function modifyPasswd($id, $arr)
    {
        $result = 0;
        if ($arr['new'] == $arr['repeat']) {
            $manager = $this->findByPk($id);
            if (!empty($manager) && McryptComponent::decryption($manager->passwd) == $arr['old']) {
                $manager->passwd = McryptComponent::encryption($arr['new']);
                if ($manager->save()) {
                    $result = 1;
                }
            } else {
                $result = -1;
            }
        }
        return $result;
    }

    public function changeStatus($id, $status="disable")
    {
        $result = 0;
        if (in_array($status, array('disable', 'enable'))) {
            $manager = $this->getById($id);
            if (!empty($manager)) {
                if ($status == "disable") {
                    $manager->status = Manager::MAN_STATUS_DISABLE;
                } else if ($status == "enable") {
                    $manager->status = Manager::MAN_STATUS_NORMAL;
                }
                if ($manager->save()) {
                    $result = self::EXECUTE_SUCCESS;
                }
            }
        } else {
            $result = self::ERROR_NOT_FIND;
        }
        return $result;
    }

    public function deleteById($id)
    {
        $result = false;
        $manager = $this->getById($id);
        if (!empty($manager)) {
            $manager->is_deleted = 1;
            $result = $manager->save();
        }
        return $result;

    }
    private function getById($id)
    {
        $result = null;
        $tmp = $this->findByPk($id);
        if (!empty($tmp) && $tmp->is_deleted == 0) {
            $result = $tmp;
        }
        return $tmp;
    }
    public function getArrById($id)
    {
        $result = array();
        $tmp = $this->getById($id);
        if (!empty($tmp)) {
            $item = $tmp->attributes;
            if (!empty($item['sp'])) {
                $item['sp'] = CJSON::decode($item['sp']);
            }
            $result = $item;
        }
        return $result;
    }
    private function getByAttributes($arr)
    {
        $result = null;
        $result = $this->findByAttributes(array('is_deleted' => 0, 'name' => $arr['name']));
        return $result;
    }


    public function isUsingName($name)
    {
        $isUsingName = false;
        $manager = $this->getByAttributes(array('name' => $name));
        if (!empty($manager)) {
            $isUsingName = true;
        }
        return $isUsingName;
    }

    public function managers($filter = array())
    {
        $result = array();
        $managers = array();

        $criteria = new CDbCriteria;
        $criteria->addColumnCondition(array('is_deleted' => 0));
        
        $count = $this->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 20;
        if (!empty($filter['pageSzie'])) {
            $pages->pageSize = $filter['pageSzie'];
        }
        if (!empty($filter['current_page'])) {
            $pages->setCurrentPage($filter['current_page']);
        }
        $pages->applyLimit($criteria);

        $objects = $this->findAll($criteria);
        if (!empty($objects)) {
            foreach ($objects as $obj) {
                $item = $obj->attributes;
                if (!empty($item['sp'])) {
                    $item['sp'] = CJSON::decode($item['sp']);
                }
                $managers[] =  $item;
            }
        }
        $result = array('managers' => $managers, 'pages' => $pages);
        return $result;
    }
}

?>