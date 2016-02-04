<?php

class SiteController extends Controller
{

	public function actionIndex()
	{
		//seo
		$title[] = Config::model()->get('title');
		$this->setPageTitle(implode('-',$title));
		
		$keywords = array('成都网站设计','成都网站建设','成都网站优化','成都网站维护','成都网站制作','成都网站建设公司','成都网站制作公司','成都网站设计公司','成都网络营销公司');
		$this->setPageState('keywords',implode(',',$keywords));

		$description[] = Config::model()->get('name').'主要提供包括网站建设、域名注册、网站设计制作、网站优化托管、网络综合营销在内的一站式网络应用及解决方案，'.Config::model()->get('name').'是一家四川地区知名的专业互联网运营商之一。';
		$this->setPageState('description',implode(',',$description));
		

		$this->render('index');
	}


	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	/**
	 * This is the action to handle external exceptions.
	 */

    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->renderPartial('error', $error);
        }
    }





}
