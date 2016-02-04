<?php
/*
	//计划任务，实现异步
	author yanxf
	$task = task[,time]
*/
class Task
{
	public static function add($task)
	{
		$queue = Config::model()->get('task');
		if(empty($queue))
			$queue = array();
		else
			$queue = json_decode($queue);
		array_push($queue,$task);
		return Config::model()->set('task',json_encode($queue));
	}

	public static function queue()
	{
		$task = Config::model()->get('task');
		Config::model()->set('task','[]');
		if(!empty($task))
		{
			$task = json_decode($task);
			$task = array_unique($task);
			foreach($task as $k => $v)
			{
				//echo '<pre>';
				//echo date('Y-m-d H:i:s').' task: '.$v;
				//echo "\r\n";

				$t = explode(',',$v);
				if(count($t)>1)
				{
					if($t[1] <= time())
					{
						self::handle($t[0]);
						unset($task[$k]);
					}
				}else{
					self::handle($v);
					unset($task[$k]);
				}
			}
			if(!empty($task))
			{
				foreach($task as $t)
					self::add($t);
			}
		}
	}
	public static function queueList()
	{
		$task = Config::model()->get('task');
		if(!empty($task))
		{
			$task = json_decode($task);
			$task = array_unique($task);
			echo '<pre>';
			foreach($task as $k => $v)
			{
				echo 'task: '.$v;
				echo "\r\n";
			}
		}
	}
	public static function handle($task)
	{
		echo '<pre>';
		echo date('Y-m-d H:i:s').' handle task: '.$task;
		echo "\r\n";
		switch($task)
		{
			case 'sms':
				Sms::model()->send();
				break;
		}
	}
}
