<?php

class ArticleCategorySlideController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column2';
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
        //取category_id对应的site_id
        $categoryId = intval(Yii::app()->request->getParam('category_id'));
        $categoryData = Yii::app()->db->createCommand()
                ->select('*')
                ->from('article_category')
                ->where('id = :id', array(
                    ':id'=>$categoryId,
                ))->queryRow();
        if(empty($categoryData)){
            exit('Access Denied');
        }
		$this->siteid = intval($categoryData['site_id']);
		//判断该站点是否属于该用户
        $data = Yii::app()->db->createCommand()
                ->select('*')
                ->from('site')
                ->where('id=:siteid AND uid=:uid', array(
                    ':siteid' =>  $this->siteid,
                    ':uid' => $this->uid,
                ))->queryRow();
        if(empty($data)){
            exit('Access Denied');
        }
        
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
		$model=new ArticleCategorySlide;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ArticleCategorySlide']))
		{
			$model->attributes=$_POST['ArticleCategorySlide'];
			if($model->save()){
				$this->redirect(array('admin','id'=>$model->id, 'category_id'=>$model->category_id));
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

		if(isset($_POST['ArticleCategorySlide']))
		{
			$model->attributes=$_POST['ArticleCategorySlide'];
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
		$dataProvider=new CActiveDataProvider('ArticleCategorySlide');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ArticleCategorySlide('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ArticleCategorySlide']))
			$model->attributes=$_GET['ArticleCategorySlide'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ArticleCategorySlide the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ArticleCategorySlide::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ArticleCategorySlide $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='article-category-slide-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
