<?php

class DefaultController extends RController
{
	public $layout='/layouts/column2';

	//Rights 接管权限管理 Begin
	public function filters()
	{
		return array(
			'rights',
		);
	}

	public function init(){
		parent::init();
		$this->menu = require 'default_menu.php';
	}

	public function actionIndex()
	{
		$this->redirect('/admin/site');
	}
}
