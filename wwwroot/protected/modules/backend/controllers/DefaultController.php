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

	public function allowedActions()
	{
		return '';
	}
        
	public function actionIndex()
	{
		$this->redirect('/backend/activity');
	}
}