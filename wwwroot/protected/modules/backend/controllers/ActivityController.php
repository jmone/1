<?php

class ActivityController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column2';
        
        public $defaultAction = 'admin';

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
		$model=new Activity;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Activity']))
		{
			$model->attributes=$_POST['Activity'];
                        if($model->status==1 && $this->getActivityCount(1)>0){
                            Yii::app()->user->setFlash('error','只允许有一个活动为开启状态');
                            $this->refresh();
                        }else{
                            if($model->save()){
//                                $this->redirect(array('view','id'=>$model->id));
                                Yii::app()->user->setFlash('success','创建成功');
                                $this->refresh();
                            }
				
                        }
			
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

		if(isset($_POST['Activity']))
		{
			$model->attributes=$_POST['Activity'];
                        if($model->status==1 && $this->getActivityCount(1)>0){
                            Yii::app()->user->setFlash('error','只允许有一个活动为开启状态');
                            $this->refresh();
                        }else{
                            if($model->save()){
//                                $this->redirect(array('view','id'=>$model->id));
                                Yii::app()->user->setFlash('success','活动修改成功');
                                $this->refresh();
                            }
                        }
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
		$dataProvider=new CActiveDataProvider('Activity');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Activity('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Activity'])){
			$model->attributes=$_GET['Activity'];
                }else{
                    $model->status = 1;                    
                }
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Activity the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Activity::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Activity $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='activity-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        private function getActivityCount($status){
            return Yii::app()->db->createCommand()->select('count(*)')->from('activity')->where('status=:status',array(':status'=>  intval($status)))->queryScalar();
        }
}
