<?php 
/**
 * @author wanthings.com chengx nixgnehc@gmail.com
 */

class BWebUser extends CWebUser
{
    /**
     * 获取当前登陆用户拥有的特殊权限
     * @return [type] [description]
     */
    public function getSp()
    {
        $result = array();
        $sp_str = Yii::app()->user->getState('sp');
        if (!empty($sp_str)) {
            $result = CJSON::decode($sp_str);
        }
        return $result;
    }

    public function login($identity,$duration=0)
    {
        parent::login($identity,$duration);
        Yii::app()->user->setState('sp', $identity->getSp());
        return !$this->getIsGuest();
    }
}