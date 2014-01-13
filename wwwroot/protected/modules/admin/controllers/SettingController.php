<?php

class SettingController extends RController
{
	public $layout='/layouts/column2';
	private $siteid = 0;

	//Rights 接管权限管理 Begin
	public function filters(){
		return array(
			'rights',
		);
	}

	public function init(){
		parent::init();
		$this->siteid = intval($_GET['siteid']);
		//判断该站点是否属于该用户
		$this->menu = require 'setting_menu.php';
	}

	public function actionIndex($siteid){
		$model=Site::model()->findByPk($siteid);
		$this->render('/site/setting',array(
			'model'=>$model,
		));
	}

	public function actionUpdate(){

	}

	public function actionArticle(){
		$model=new Article('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Article']))
			$model->attributes=$_GET['Article'];

		$this->render('/article/admin',array(
			'model'=>$model,
		));
	}

	public function actionCategory(){
		$model=new ArticleCategory('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ArticleCategory']))
			$model->attributes=$_GET['ArticleCategory'];

		$this->render('/articleCategory/admin',array(
			'model'=>$model,
		));
	}
	public function actionMessage(){
		$model=new Message('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Message']))
			$model->attributes=$_GET['Message'];

		$this->render('/message/admin',array(
			'model'=>$model,
		));
	}
	public function actionFriendLink(){
		$model=new FriendLink('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FriendLink']))
			$model->attributes=$_GET['FriendLink'];

		$this->render('/friendLink/admin',array(
			'model'=>$model,
		));
	}
	public function actionJob(){
		$model=new Job('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Job']))
			$model->attributes=$_GET['Job'];

		$this->render('/job/admin',array(
			'model'=>$model,
		));
	}
}
