<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SmallToolController
 *
 * @author justin
 */
class SmallToolController extends RController {

    public $layout = '/layouts/column2';
    private $activityId;
    //Rights 接管权限管理 Begin
    public function filters() {
        return array(
            'rights',
        );
    }

    public function allowedActions() {
        return '';
    }

    //Rights 接管权限管理 End

    public function Init() {
        parent::init();
        $this->menu = FALSE;
        $activityId = Yii::app()->db->createCommand()->select('id')->from('activity')->where('status=1')->queryScalar();
        $this->activityId = intval($activityId);
    }

    public function actionSign() {
        Yii::app()->db->createCommand()->update('apply', array('sign_dateline' => time()), 'activity_id=:activity_id', array(':activity_id' => $this->activityId));
        echo 'ok';exit;
    }

    public function actionSignClear() {
        Yii::app()->db->createCommand()->update('apply', array('sign_dateline' => 0), 'activity_id=:activity_id', array(':activity_id' => $this->activityId));
        echo 'ok';
    }

    public function actionLuckyClear() {
        Yii::app()->db->createCommand()->update('apply', array('status' => 0), 'activity_id=:activity_id', array(':activity_id' => $this->activityId));
        echo 'ok';
    }

}

?>
