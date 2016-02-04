<?php
class SmsToUser extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '{{sms_to_user}}';
    }

	public function relations()
	{
		return array(
			'user'=>array(self::BELONGS_TO,'User','user_id'),
            'to_user'=>array(self::HAS_MANY,'SmsToUser','sms_id'),
		);
	}

}
?>
