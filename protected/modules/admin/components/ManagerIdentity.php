<?php
/**
 * @author wanthings.com chengx nixgnehc@gmail.com
 */
class ManagerIdentity extends CUserIdentity
{

    private $id;
    public $errorMessage='帐号或者密码错误!';
    private $sp;

    public function authenticate()
    {
        $manager = Manager::model()->getArrByAttributes(array('name'=>$this->name));
        if(empty($manager)) {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        } else if ($manager['status'] != Manager::MAN_STATUS_NORMAL) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if (McryptComponent::decryption($manager['passwd']) != $this->password) {
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        } else{
            $this->errorCode=self::ERROR_NONE;
            $this->id = $manager['id'];
            $this->sp = $manager['sp'];
        }
        return !$this->errorCode;
    }

    /**
     * 获取特殊权限
     * @return [type] [description]
     */
    public function getSp()
    {
        return $this->sp;
    }

    public function getId()
    {
        return $this->id;
    }
}
