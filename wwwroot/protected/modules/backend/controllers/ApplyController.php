<?php

class ApplyController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column2';

	//Rights 接管权限管理 Begin
	public function filters()
	{
		return array(
				'rights',
		);
	}

	public function allowedActions()
	{
		return '';
	}
	//Rights 接管权限管理 End

	public function Init()
	{
		parent::init();
		$menu = require 'menus.php';
		$this->menu = $menu;
	}
        
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Apply;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Apply']))
		{
			$model->attributes=$_POST['Apply'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Apply']))
		{
			$model->attributes=$_POST['Apply'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Apply');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($activityId)
	{
		$model=new Apply('search');
		$model->unsetAttributes();  // clear any default values
                if(isset($_GET['Apply'])){
			$model->attributes=$_GET['Apply'];
                }
                $model->activity_id = intval($activityId);
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Apply the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Apply::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Apply $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='apply-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionSend(){
            $id = Yii::app()->request->getParam('id');
            $id = intval($id);
            $result = Yii::app()->db->createCommand()->select('*')->from('apply')->where('id=:id and status=1',array(':id'=>$id))->queryRow();
            if($result===FALSE || $result['status']<>1){
                echo '该用户未中奖或已领奖';
                exit;
            }else{
                Yii::app()->db->createCommand()->update('apply', array('status'=>2),'id=:id',array(':id'=>$id));
                 echo 'success';exit;
            }               
        }
        
        /**
	 * actionSign 
	 * 
	 * @access public
	 * @return void
	 */
	public function actionSignOld(){
		$model = new CodeFormModel(); 
		$this->menu = array();
		$this->layout = false;
                $activityId = Yii::app()->db->createCommand()->select('id')->from('activity')->where('status=1')->queryScalar();
		if(isset($_POST['CodeFormModel'])){
			$model->attributes=$_POST['CodeFormModel'];
			if($model->validate()){
				$codeInfo = $model->getInfo();
                                $codeRecord = Apply::model()->findByAttributes(array('code'=>$codeInfo->code,'sign_dateline'=>0));
                                if($codeRecord){
                                        $codeRecord->sign_dateline = time();
//                                        if($codeRecord->save()){
                                        if(Yii::app()->db->createCommand()->update('apply', array('sign_dateline'=>time()),'id=:id',array(':id'=>$codeRecord->id))){
                                                Yii::app()->user->setFlash('success','成功签到');
                                        }else{
                                                Yii::app()->user->setFlash('error','服务有问题了火速联系技术');
                                        }
                                }else{
                                        Yii::app()->user->setFlash('error','签到失败');
                                }
			}else{
				$error = '';
				foreach($model->getErrors('code') as $e){
					$error.=$e;
				}
				Yii::app()->user->setFlash('error', $error);
				$model->clearErrors();
			}
		}
		$this->render('sign', array('model'=>$model,'activityId'=>$activityId));    
	}
        
        public function actionSign(){
            $this->menu = array();
	    $this->layout = false;            
            if($_POST && isset($_POST['code'])){
                $code = Yii::app()->request->getParam('code');
                $activityId = Yii::app()->db->createCommand()->select('id')->from('activity')->where('status=1')->queryScalar();
                $codeInfo = Yii::app()->db->createCommand()
                        ->select('*')
                        ->from('apply')
                        ->where('code=:code and activity_id=:activity_id',array(':code'=>  intval($code),':activity_id'=>$activityId))
                        ->queryRow();
                if($codeInfo===FALSE){
                    Yii::app()->user->setFlash('error','验证码不存在');
                }else{
                    if($codeInfo['sign_dateline']>0){
                        Yii::app()->user->setFlash('error', '验证码' . $code . '已经被' . $codeInfo['uid'] . '于' . date('Y-m-d H:i:s',$codeInfo['sign_dateline']) . '使用!');
                    }else{
                        if(Yii::app()->db->createCommand()->update('apply', array('sign_dateline'=>time()),'id=:id',array(':id'=>$codeInfo['id']))){
                                Yii::app()->user->setFlash('success','成功签到');
                        }else{
                                Yii::app()->user->setFlash('error','服务有问题了火速联系技术');
                        }
                    }
                }
            }
            $this->render('sign');
        }


        public function actionSignOff(){
            $model = new Code2FormModel(); 
		$this->menu = array();
		$this->layout = false;
		if(isset($_POST['Code2FormModel'])){
			$model->attributes=$_POST['Code2FormModel'];
			if($model->validate()){
				$codeInfo = $model->getInfo();
                                $codeRecord = Apply::model()->findByAttributes(array('code'=>$codeInfo->code,'sign_off_dateline'=>0));
                                if($codeRecord && $codeRecord->sign_dateline>0){
//                                        $codeRecord->sign_off_dateline = time();
//                                        if($codeRecord->save()){
                                          if(Yii::app()->db->createCommand()->update('apply', array('sign_off_dateline'=>time()),'id=:id',array(':id'=>$codeRecord->id))){
                                                Yii::app()->user->setFlash('success','成功签退，可发放奖品');
                                        }else{
                                                Yii::app()->user->setFlash('error','服务有问题了火速联系技术');
                                        }
                                }else{
                                        Yii::app()->user->setFlash('error','签退失败!没有该用户记录，或该用户未签到');
                                }
			}else{
				$error = '';
				foreach($model->getErrors('code') as $e){
					$error.=$e;
				}
				Yii::app()->user->setFlash('error', $error);
				$model->clearErrors();
			}
		}
                
                $activityId = Yii::app()->db->createCommand()->select('id')->from('activity')->where('status=1')->queryScalar();
		$this->render('signOff', array('model'=>$model,'activityId'=>$activityId)); 
        }
}
