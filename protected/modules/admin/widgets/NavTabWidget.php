<?php
class NavTabWidget extends CWidget
{
    public $index;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $full_menu = array();

        $full_menu['manager'][] = array('平台用户', '/admin/manager/index');
        $full_menu['manager'][] = array('新增', '/admin/manager/add');
        
        $full_menu['visit_stat'][] =array('最近1天','/admin/stat/visit');
        $full_menu['visit_stat'][] =array('最近7天','/admin/stat/visit_week');
        $full_menu['visit_stat'][] =array('最近30天','/admin/stat/visit_month');

        $menus = $full_menu[$this->index];
        $current_menu = '/admin/'.$this->controller->id.'/'.$this->controller->action->id;
        $this->render("NavTab", compact('menus', 'current_menu'));
    }
}
?>
