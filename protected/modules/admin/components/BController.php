<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class BController extends Controller
{
    public $rule;
    /*
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    
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

  
    public function beforeAction($action)
    {
        parent::beforeAction($action);
        $this->layout = 'admin';
        $this->controller_id = $this->getId();
        $this->action_id = $this->getAction()->getId();
        $this->referer = Yii::app()->request->getUrlReferrer();
        $this->pageTitles[] = Yii::app()->name;
        
        $this->visitCheck();

        return true;
    }

    /**
     * 校验访问权限
     * @return [type] [description]
     */
    private function visitCheck()
    {
        $this->rule['guest'] = array(
            'manager'=>array('login', 'logout'),
            'site'=>array('verify'),
        );
        if(Yii::app()->user->getIsGuest()){
            if(empty($this->rule['guest'][$this->controller_id]) || !in_array($this->action_id,$this->rule['guest'][$this->controller_id])) {
                $this->showMessage('请先登陆','/admin/manager/login');
            }
        } else {
            if(empty($this->rule['guest'][$this->controller_id]) || !in_array($this->action_id,$this->rule['guest'][$this->controller_id])) {
                $manager_sp = Manager::model()->sp();
                if (!empty($manager_sp)) {
                    $manager_sp_controllers = array_keys($manager_sp);
                    $self_sp_controllers = Yii::app()->user->getSp();
                    if (in_array($this->controller_id, $manager_sp_controllers) && !in_array($this->controller_id, $self_sp_controllers)) {
                        throw new CHtteException(404);
                    }
                }
            }
        }
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


    public function showSuccess($msg, $url = '')
    {
        $message = array();
        $message['type'] = 'success';
        $message['msg'] = $msg;
        Yii::app()->user->setFlash('alertmsg', $message);
        if (!empty($url)) {
            $this->redirect($url);
        }
    }

    public function showError($msg, $url = '')
    {
        $message = array();
        $message['type'] = 'error';
        $message['msg'] = $msg;
        Yii::app()->user->setFlash('alertmsg', $message);
        if (!empty($url)) {
            $this->redirect($url);
        }
    }
    
    public function showMessage($msg, $url = '',$type=false)
    {
        $message = array();
        $message['type'] = $type;
        $message['msg'] = $msg;
        Yii::app()->user->setFlash('alertmsg', $message);
        if (!empty($url)) {
            $this->redirect($url);
        }
    }

}
