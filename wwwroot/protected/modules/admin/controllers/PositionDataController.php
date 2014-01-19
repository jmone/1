<?php

class PositionDataController extends RController
{
	public $layout='/layouts/column2';
    public $defaultAction = 'admin';
	private $siteid = 0;
    private $uid = 0;

	public function filters(){
		return array(
			'rights',
		);
	}

	public function init(){
		parent::init();
		$this->uid = intval(Yii::app()->user->getId());        
		$this->menu = require 'setting_menu.php';
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
		$model=new PositionData;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PositionData']))
		{
            //需要判断$_POST['PositionData']['position_id']对应的推荐位position所对应的网站是否属于当前管理员用户
            
			$model->attributes=$_POST['PositionData'];
			if($model->save()){
				$this->redirect(array('admin','position_id'=>$model->position_id));
            }
		}

        $positionId = intval(Yii::app()->request->getParam('position_id'));
        $model->setAttribute('position_id', $positionId);
        
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

		if(isset($_POST['PositionData']))
		{
			$model->attributes=$_POST['PositionData'];
			if($model->save()){
				$this->redirect(array('admin','position_id'=>$model->position_id));
            }
		}

        //$positionId = intval(Yii::app()->request->getParam('position_id'));
        //$model->setAttribute('position_id', $positionId);
        
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
		$dataProvider=new CActiveDataProvider('PositionData');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PositionData('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PositionData'])){
			$model->attributes=$_GET['PositionData'];
        }
        $positionId = intval(Yii::app()->request->getParam('position_id'));
        $model->setAttribute('position_id', $positionId);
        
		$this->render('admin',array(
			'model'=>$model,
            'positionId'=>$positionId,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PositionData the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PositionData::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PositionData $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='position-data-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
