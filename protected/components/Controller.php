<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{

    public $controller_id;
    public $action_id;
    public $referer;
    public $pageTitles;
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout='//layouts/main';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu=array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs=array();

    public function getArticleApp()
    {
        return $this->article_app;
    }
    public function beforeAction($action)
    {
        parent::beforeAction($action);
        $this->controller_id = $this->getId();
        $this->action_id = $this->getAction()->getId();

        // 记录访问日志
        LogComponent::Visitor();
        return true;
    }

    protected function beforeRender($view) 
    {
        parent::beforeRender($view);

        $titles = $this->pageTitles;
        $titles[] = Config::model()->get('title');
        $this->setPageTitle(implode(' - ', $titles));
        return true;
    }

    protected function afterAction($action)
    {
        $message = Yii::app()->user->getFlash('alertmsg');
        if($message!=null)
        {
            if($message['type'])
                echo '<script>alert("'.$message['msg'].'");</script>';
            else
                echo '<script>alert("'.$message['msg'].'");</script>';
        }
    }
}
