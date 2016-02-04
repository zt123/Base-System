<?php

class AdminModule extends CWebModule
{
    public $defaultController = 'site';
    public $layout = 'admin';

    public function init()
    {
        parent::init();
        $this->setImport(array(
            'admin.components.*',
            'admin.models.*'
        ));

        Yii::app()->setComponents(array(
            'errorHandler'=>array(
                'class'=>'CErrorHandler',
                'errorAction'=>'admin/site/error',
            ),
            'user'=>array(
                'allowAutoLogin'=>false,
                'class' => 'BWebUser',
            ),
        ));

        //$base_dir = $this->getBasePath();
        //$layoutPath = $base_dir.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'layouts';
        //$this->setLayoutPath($layoutPath);
    }
}
?>
