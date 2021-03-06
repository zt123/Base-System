<?php 
/**
 * @author wanthings.com chengx nixgnehc@gmail.com
 */
class SystemController extends BController
{

    public function actionSetting()
    {
        if (!Yii::app()->request->isPostRequest)
        {
            $data['icp']            = Config::model()->get('icp');
            $data['name']           = Config::model()->get('name');
            $data['description']    = Config::model()->get('description');
            $data['title']          = Config::model()->get('title');
            $data['image_key']      = Config::model()->get('image_key');
            $data['image_path_encrypt'] = Config::model()->get('image_path_encrypt');
            $data['cache_expired']  = Config::model()->get('cache_expired');
            $data['tel']            = Config::model()->get('tel');
            $data['phone']          = Config::model()->get('phone');
            $data['addr']           = Config::model()->get('addr');
            $data['stats']          = Config::model()->get('stats');
            $data['online_store_address'] = Config::model()->get('online_store_address');
            $data['im'] = Config::model()->get('im');
            $data['baidu_share']    = Config::model()->get('baidu_share');
            $data['cst'] = Config::model()->get('cst');
            $this->setPageTitle('系统设置');
            $this->render('setting',$data);
        }else{
            $fileComponent = new FilesComponent;
            $fileCst = $fileComponent->upload('cst');
            if (!empty($fileCst)) {
                Config::model()->set('cst', $fileCst['hash']);
            }
            if (!empty($_POST['online_store_address'])) {
                Config::model()->set('online_store_address', $_POST['online_store_address']);
            }
            if(!empty($_POST['icp']))
                Config::model()->set('icp', $_POST['icp']);
            if(!empty($_POST['title']))
                Config::model()->set('title', $_POST['title']);
            if(!empty($_POST['cache_expired']))
                Config::model()->set('cache_expired', $_POST['cache_expired']);
            if(!empty($_POST['stats']))
                Config::model()->set('stats', $_POST['stats']);
            else
                Config::model()->set('stats','');

            if(!empty($_POST['image_path_encrypt']))
                Config::model()->set('image_path_encrypt', 1);
            else
                Config::model()->set('image_path_encrypt',0);
            
            if(!empty($_POST['name']))
                Config::model()->set('name', $_POST['name']);
            else
                Config::model()->set('name','');
            if(!empty($_POST['description']))
                Config::model()->set('description', $_POST['description']);
            else
                Config::model()->set('description','');

            if(!empty($_POST['image_key']))
                Config::model()->set('image_key', $_POST['image_key']);
            else
                Config::model()->set('image_key','');
            
            if(!empty($_POST['tel']))
                Config::model()->set('tel', $_POST['tel']);
            else
                Config::model()->set('tel','');

            if(!empty($_POST['addr']))
                Config::model()->set('addr', $_POST['addr']);
            else
                Config::model()->set('addr','');

            if(!empty($_POST['baidu_share']))
                Config::model()->set('baidu_share', $_POST['baidu_share']);
            else
                Config::model()->set('baidu_share','');

            if(!empty($_POST['phone']))
                Config::model()->set('phone', $_POST['phone']);
            else
                Config::model()->set('phone','');
            
            if(!empty($_POST['im']))
                Config::model()->set('im', $_POST['im']);
            else
                Config::model()->set('im','');

            $this->showSuccess('ÐÞ¸Ä³É¹¦','/admin/system/setting');
        }
    }

}