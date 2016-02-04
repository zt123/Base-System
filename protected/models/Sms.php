<?php
class Sms extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '{{sms}}';
    }

	public function relations()
	{
		return array(
			'user'=>array(self::BELONGS_TO,'User','user_id'),
            'to_user'=>array(self::HAS_MANY,'SmsToUser','sms_id'),
		);
	}












	/* behavior */



	public function create($content,$user=null,$cuser=0,$stime=0)
	{
		$model = new Sms;
		$model->year = date('Y',time());
		$model->month = date('m',time());
		$model->day = date('d',time());
		$model->message = $content;
		$model->ctime = time();
		$model->stime = $stime;
		$model->user_id = $cuser;
		if(empty($user))
		{
			$model->send_all = 1;
			$model->save();
		}else{
			$model->save();
			if(is_array($user))
			{
				foreach ($user as $u)
				{
					$sms_user = new SmsToUser;
					$sms_user->sms_id = $model->id;
					$sms_user->user_id = $u;
					$sms_user->save();
				}
			}else{
				$sms_user = new SmsToUser;
				$sms_user->sms_id = $model->id;
				$sms_user->user_id = $user;
				$sms_user->save();
			}
		}
		if(empty($stime))
			Task::add('sms');
		else
			Task::add('sms,'.$stime);
		return true;
	}

	public function edit($content,$user=null,$cuser=0,$stime=0)
	{
		$model = Sms::model()->findByPk($_GET['id']);
		$model->year = date('Y',time());
		$model->month = date('m',time());
		$model->day = date('d',time());
		$model->message = $content;
		$model->ctime = time();
		$model->stime = $stime;
		$model->user_id = $cuser;
		if(empty($user))
		{
			$model->send_all = 1;
			$model->save();
		}else{
			$model->save();
			$users = $model->user();
			foreach($users as $du)
			{
				$du->delete();
			}

			if(is_array($user))
			{
				foreach ($user as $u)
				{
					$sms_user = new SmsToUser;
					$sms_user->sms_id = $model->id;
					$sms_user->user_id = $u;
					$sms_user->save();
				}
			}else{
				$sms_user = new SmsToUser;
				$sms_user->sms_id = $model->id;
				$sms_user->user_id = $user;
				$sms_user->save();
			}
		}
		if(empty($stime))
			Task::add('sms');
		else
			Task::add('sms,'.$stime);
		return true;
	}

	public function send()
	{
		$criteria = new CDbCriteria;
		$criteria->addCondition('status = 0 AND stime <='.time());
		$criteria->order = 'id ASC';
		$sms = Sms::model()->findAll($criteria);
		if(!empty($sms))
		{
			foreach($sms as $s)
			{
				$numbers = array();
				if($s->send_all == 1)
				{
					$criteria = new CDbCriteria;
					$criteria->addCondition('id != 0 AND resignation = 0 AND disabled = 0 AND is_deleted =0');
					$users = User::model()->findAll($criteria);
					if(!empty($users))
					{
						foreach($users as $u)
						{
							$numbers[] = $u->phone;
						}
					}
				}else{
					$users = $s->to_user();
					if(!empty($users))
					{
						foreach($users as $u)
						{
							$numbers[] = $u->user->phone;
						}
					}
				}
				if(!empty($numbers))
				{
					try{
						if(ISMG::send($s->message,implode(',',$numbers)))
						{
							$s->status = 1;
							$s->save();
						}else
							throw new Exception('Send SMS Error');
					}catch (Exception $e) {
						echo $e->getMessage();
					}
				}
			}
		}
		return true;
	}

}
?>
