<?php 
class StatController extends BController
{
    public function beforeAction($action)
    {
        parent::beforeAction($action);
        $this->setPageTitle('访问统计');
        return true;
    }

    public function actionVisit()
    {
        $bhv = new StatBehavior();
        $result = $bhv->lastDayVisitor();
        $this->render("visit_day",$result);
    }
    public function actionVisit_week()
    {
        $bhv = new StatBehavior();
        $result = $bhv->lastWeekVisitor();
        $this->render("visit",$result);
    }
    public function actionVisit_month()
    {
        $bhv = new StatBehavior();
        $result = $bhv->lastMonthVisitor();

        
        $this->render("visit",$result);
    }
    // public function actionUser()
    // {
    //  $bhv = new StatBehavior();
    //  $result = $bhv->lastMonthUser();

 //        $this->setPageTitle("用户统计");
    //  $this->render("user",$result);
    // }
}
?>
