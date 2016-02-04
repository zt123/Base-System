<?php

class CronController extends CController
{
	public function actionIndex()
	{
		Task::queue();
	}
	public function actionList()
	{
		Task::queueList();
	}

}
