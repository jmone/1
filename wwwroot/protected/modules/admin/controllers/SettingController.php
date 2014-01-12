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
}
