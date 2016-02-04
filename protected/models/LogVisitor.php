<?php
class LogVisitor extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return '{{log_visitor}}';
    }
/*
     public function behaviors(){
        return array(
            'TimeStampBehavior' =>array(
                'class'  =>'application.behaviors.TimeStampBehavior'
            ),
        );
    }
*/
}
