<?php
class NavListWidget extends CWidget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $category                = array();
        $menus                   = array();

        $category['stat'] = '访客统计';
        $menus['stat'][] = array('访问统计', '/admin/stat/visit');
        $menus['stat'][] = array('三方统计','http://tongji.baidu.com/web/welcome/ico?s=17978066889cd84953900994ae849d62');

        $category['sys'] = '系统管理';
        $menus['sys'][] = array('用户列表', '/admin/manager/index');
        $menus['sys'][] = array('系统设置', '/admin/system/setting');


        // current codes is check up the special privileges and remove it.
        $manager_sp = Manager::model()->sp();
        if (!empty($manager_sp)) {
            $self_sp_controllers = Yii::app()->user->getSp();
            $manager_sp_controller = array_keys($manager_sp);
            foreach ($menus as $one_level_key => $one_level_value) {
                foreach ($one_level_value as $two_level_key => $two_level_value) {
                    $tmp_controller = explode('/', $two_level_value[1]);
                    if (!empty($tmp_controller[2]) && in_array($tmp_controller[2], $manager_sp_controller) && !in_array($tmp_controller[2], $self_sp_controllers)) {
                        unset($menus[$one_level_key][$two_level_key]);
                    }
                }
            }
            foreach ($category as $key => $value) {
                if (empty($menus[$key])) {
                    unset($category[$key]);
                }
            }
        }
        // over
         
        $c = $this->controller->id;
        $a = $this->controller->action->id;
        $ac = '';
        $am = '';
        foreach ($menus as $ck => $ms) {
            foreach ($ms as $m) {
                if ('/admin/'.$c.'/'.$a == $m[1]) {
                    $ac = $ck;
                    $am = '/admin/'.$c.'/'.$a;
                }
            }
        }
        $this->render("NavList", compact('category', 'menus', 'c', 'a', 'ac', 'am'));
    }
}
?>
