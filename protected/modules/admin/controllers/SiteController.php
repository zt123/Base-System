<?php
class SiteController extends BController
{
    public function actionIndex()
    {
        $this->setPageTitle('首页');
        $this->render('index');
    }

    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo json_encode($error);

            } else {
                echo "<pre>";
                print_r($error);
            }
        }
    }
}
?>
