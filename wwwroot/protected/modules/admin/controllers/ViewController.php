<?php
/**
 * 
 */
class ViewController extends RController
{
	public $layout='/layouts/column2';
	private $siteid = 0;
    private $uid = 0;

	//Rights 接管权限管理 Begin
	public function filters(){
		return array(
			'rights',
		);
	}

	public function init(){
		parent::init();
		$this->uid = intval(Yii::app()->user->getId());
	}
    
    public function actionArticleCategory(){
        $id = intval(Yii::app()->request->getParam('id'));
		$model=ArticleCategory::model()->findByPk($id);
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
        }
        
        $this->siteid = $model->attributes['site_id'];
		$this->menu = require 'setting_menu.php';
		$this->render('/articleCategory/view',array(
			'model'=>$model,
		));
    }
    public function actionArticle(){
        $id = intval(Yii::app()->request->getParam('id'));
		$model=Article::model()->findByPk($id);
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
        }
        
		$categoryModel=ArticleCategory::model()->findByPk($model->attributes['category_id']);
        $this->siteid = $categoryModel->attributes['site_id'];
		$this->menu = require 'setting_menu.php';
		$this->render('/article/view',array(
			'model'=>$model,
		));
    }
    public function actionMessage(){
        $id = intval(Yii::app()->request->getParam('id'));
		$model=Message::model()->findByPk($id);
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
        }
        
        $this->siteid = $model->attributes['site_id'];
		$this->menu = require 'setting_menu.php';
		$this->render('/message/view',array(
			'model'=>$model,
		));
    }
    public function actionFriendLink(){
        $id = intval(Yii::app()->request->getParam('id'));
		$model=FriendLink::model()->findByPk($id);
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
        }
        
        $this->siteid = $model->attributes['site_id'];
		$this->menu = require 'setting_menu.php';
		$this->render('/friendLink/view',array(
			'model'=>$model,
		));
    }
    public function actionJob(){
        $id = intval(Yii::app()->request->getParam('id'));
		$model=Job::model()->findByPk($id);
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
        }
        
        $this->siteid = $model->attributes['site_id'];
		$this->menu = require 'setting_menu.php';
		$this->render('/job/view',array(
			'model'=>$model,
		));
    }
}
?>