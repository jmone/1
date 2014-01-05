<?php

class DefaultController extends Controller {

    public $layout = '/layouts/main';

    public function actionIndex() {
        $activityId = Yii::app()->request->getParam('activityId');
        if(empty($activityId)){
            $activityId = Yii::app()->db->createCommand()->select('id')->from('activity')->where('status=1')->queryScalar();
        }
        $userData = Yii::app()->db->createCommand()
                ->select('code')
                ->from('apply')
                ->where('activity_id=:activity_id and sign_dateline>0', array(':activity_id' => intval($activityId)))
                ->queryAll();
        $activity = Yii::app()->db->createCommand()->select()->from('activity')->where('id=:id',array(':id'=>  intval($activityId)))->queryRow();
        $this->render('index', array('userData' => $userData,'activity'=>$activity));
    }

    public function actionLottery() {
        $activityId = Yii::app()->request->getParam('activityId');
        if(empty($activityId)){
            $activityId = Yii::app()->db->createCommand()->select('id')->from('activity')->where('status=1')->queryScalar();
        }
        $num = Yii::app()->request->getParam('num');
        $num = intval($num);
        $return = array('code' => 200, 'msg' => '', 'data' => '');
        if ($num == 0) {
            $return['code'] = 201;
            $return['msg'] = '抽奖人数设置错误';
            echo json_encode($return);
            exit();
        }
        $lottery_list = Yii::app()->db->createCommand()
                ->select('id,code,nickname as name,phone')
                ->from('apply')
                ->where('status=0 and activity_id=:activity_id and sign_dateline>0', array(':activity_id' => intval($activityId)))
                ->order(new CDbExpression('RAND()'))
                ->limit($num)
                ->queryAll();
        if (!empty($lottery_list)) {
            foreach ($lottery_list as $k=>$l) {
                $id_list[] = $l['id'];
                $lottery_list[$k]['phone'] = substr($l['phone'], 0,3).'****'.substr($l['phone'], -4);
            }
            if(!empty($id_list)){
                $id_str = implode(',', $id_list);
                $sql = "update `apply` set status=1 WHERE id in ({$id_str})";
                Yii::app()->db->createCommand($sql)->query();
            }
                            
            $return['code'] = 200;
            $return['data'] = $lottery_list;
            echo json_encode($return);
            exit();
        } else {
            $return['code'] = 202;
            $return['msg'] = '无可中奖用户';
            echo json_encode($return);
            exit();
        }
    }

}
