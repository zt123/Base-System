<?php
/**
 * @author wanthings.com chengx nixgnehc@gmail.com
 * Low level access control,general web site can useing
 */
class ManagerController extends BController
{

    public function beforeAction($action)
    {
        parent::beforeAction($action);
        if (in_array($this->action_id, array('delete', 'disable', 'enable')) && Yii::app()->request->getQuery('id') == Manager::model()->superManagerId()) {
            $this->showMessage('该账号未超级管理员账号，拒绝该操作');
            $this->redirect($this->referer);
        }
        return true;
    }


    public function actionIndex()
    {
        $data = Manager::model()->managers();
        $sp = Manager::model()->sp();
        $this->setPageTitle('平台用户列表');
        $this->render('list', compact('data', 'sp'));
    }
    
    

    public function actionLogin()
    {
        if (Yii::app()->request->isPostRequest) {
            $loginForm = Yii::app()->request->getPost('LoginForm');
            Manager::model()->registerAdmin($loginForm);
            $identity = new ManagerIdentity($loginForm['name'],$loginForm['pass']);
            if($identity->authenticate()) {
                $duration = 0;
                Yii::app()->user->login($identity, $duration);
                $this->redirect('/admin');
            }else {
                $this->showError($identity->errorMessage,'/admin/manager/login');
            }
        } else {
            if (Yii::app()->user->getIsGuest()) {
                $this->layout="null";
                $this->render("login");
            } else {
                $this->redirect('/admin');
            }

        }
    }

    public function actionLogout()
    {
        Yii::app()->user->logout(false);
        $this->redirect('/admin/manager/login');
    }

    // 修改个人资料
    public function actionMyedit()
    {
        if (Yii::app()->request->isPostRequest) {
            $manager = Yii::app()->request->getPost('manager');
            $status = Manager::model()->myEdit($manager);
            if ($status) {
                $this->showSuccess('修改成功');
            } else {
                $this->showError('修改失败');
            }
        }
        $this->setPageTitle('修改个人资料');
        $manager = Manager::model()->getArrById(Yii::app()->user->getId());
        $this->render('myedit', compact('manager'));
    }

    public function actionMypass()
    {
        if (Yii::app()->request->isPostRequest){
            $passwd = Yii::app()->request->getPost('Passwd');
            if ($passwd['new'] == $passwd['repeat']) {
                $status = Manager::model()->modifyPasswd(Yii::app()->user->getId(),$passwd);
                if ($status>0) {
                    $this->showSuccess('修改成功');
                } else {
                    $status==0?$this->showError('修改失败'):$this->showError('原密码错误');
                }
            } else {
                $this->showError("密码和确认密码不相同");
            }
        }
        $this->setPageTitle('修改我的密码');
        $this->render('password');
    }

    public function actionAdd()
    {
        if(Yii::app()->request->isPostRequest) {
            $manager = Yii::app()->request->getPost('manager');
            $status = Manager::model()->addManager($manager);
            if ($status > 0) {
                $this->showSuccess('添加成功');
            } else {
                $this->showError('添加失败');
                if ($status == Manager::ADD_ERROR_USING_NAME) {
                    $this->showError('该用户名已经使用');
                }
            }
            $this->redirect(array('/admin/manager/index'));
        }
        $this->setPageTitle('添加账号');
        $sp = Manager::model()->sp();
        $this->render('add', compact('sp'));
    }

    public function actionEdit()
    {
        if (Yii::app()->request->isPostRequest) {
            $manager = Yii::app()->request->getPost('manager');
            $status = Manager::model()->edit($manager);
            if ($status) {
                $this->showSuccess('更新成功');
                if ($manager['id'] == Manager::model()->superManagerId()) {
                    $this->showSuccess('更新成功（该账号为超级管理员账号，不可修改权限信息）。');
                }
            } else {
                $this->showError('更新失败');
            }
            $this->redirect(array('/admin/manager/edit/id/'.$manager['id']));
        }
        $id = Yii::app()->request->getQuery('id');
        $manager = Manager::model()->getArrById($id);
        $sp = Manager::model()->sp();
        $this->setPageTitle('修改:'.$manager['name']);

        $this->render('edit', compact('manager', 'sp'));
    }
    public function actionDisable()
    {
        $id = Yii::app()->request->getQuery('id');
        $status = Manager::model()->changeStatus($id, 'disable');
        if ($status > 0) {
            $this->showSuccess('禁用成功');
        } else {
            $this->showError('禁用失败');
        }
        $this->redirect('/admin/manager/index');
    }

    public function actionEnable()
    {
        $id = Yii::app()->request->getQuery('id');
        $status = Manager::model()->changeStatus($id, 'enable');
        if ($status > 0) {
            $this->showSuccess('启用成功');
        } else {
            $this->showError('启用失败');
        }
        $this->redirect('/admin/manager/index');
    }

    public function actionDelete()
    {
        $id = Yii::app()->request->getQuery('id');
        print_r($id);print_r(Yii::app()->session['manager_id']);
        if ($id == Yii::app()->session['manager_id']) {
            $this->showError('不能对自己进行该操作');
        } else {
            $status = Manager::model()->deleteById($id);
            if ($status) {
                $this->showSuccess('删除操作成功');
            } else {
                $this->showError('删除操作失败');
            }
        }
        $this->redirect('/admin/manager/index');
    }

    
}
