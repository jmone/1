<?php

class UserController extends RController
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
		return 'login, logout, captcha';
//                return 'login, logout, captcha, mcode';
	}
	//Rights 接管权限管理 End

        public function Init() {
            parent::init();
            $menu = require 'menus.php';
            $this->menu = $menu;
        }

	public function actions()
	{	
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				'height'=>'40',
				'padding'=>'0',
				'width'=>'115',
				'minLength'=>5,
				'maxLength'=>5,
				'offset'=>-2,
				'testLimit'=>0,
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			// $model->attributes= array(
	  //               'password'=>md5($salt.$_POST['User']['password']),
	  //               'salt'=>$salt
			// 	);
			if($model->save()){
				// $this->redirect(array('view','id'=>$model->id));
				Yii::app()->user->setFlash('success', '信息添加成功！ 您可以 <a data-dismiss="alert">继续添加</a> 或者 <a href="admin">返回列表页</a>');
				$this->refresh();
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
		$this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{	
			//$orpassword = $model->password;
			$model->attributes=$_POST['User'];
			// if ($_POST['User']['password'] != $orpassword) {
			// 	$salt=$this->randomKey(32);
			// 	$model->attributes= array(
			// 		'password'=>md5($salt.$_POST['User']['password']),
			// 		'repassword'=>md5($salt.$_POST['User']['password']),
			// 		'salt'=>$salt
			// 	);
			// }
			if($model->save())
			{
				// $this->redirect(array('view','id'=>$model->id));
				Yii::app()->user->setFlash('success', '信息编辑成功！ <a href="../../admin">返回列表页</a>');
				$this->refresh();
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
	// public function actionDelete($id)
	// {
	// 	if(Yii::app()->request->isPostRequest)
	// 	{
	// 		// we only allow deletion via POST request
	// 		$this->loadModel($id)->delete();

	// 		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
	// 		if(!isset($_GET['ajax']))
	// 			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	// 	}
	// 	else
	// 		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	// }


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	// public function actionChangePassword($id)
	// {	
	// 	$this->layout='/layouts/column1';
	// 	$id = intval($id);
	// 	if (!Yii::app()->user->isGuest && Yii::app()->user->id == $id) {
	// 		$model=ChangePassword::model()->findByPk($id);
	// 		$model->password = '';
	// 		// Uncomment the following line if AJAX validation is needed
	// 		$this->performAjaxValidation($model);

	// 		if(isset($_POST['ChangePassword']))
	// 		{
	// 			$model->attributes=$_POST['ChangePassword'];
	// 			$salt=$this->randomKey(32);
	// 			$model->attributes= array(
	// 				'email'=>$model->email,
	// 				'password'=>md5($salt.$_POST['ChangePassword']['password']),
	// 				'repassword'=>md5($salt.$_POST['ChangePassword']['password']),
	// 				'salt'=>$salt,
	// 				'profile'=>$model->profile,
	// 				'username'=>Yii::app()->user->name,
	// 			);
	// 			if($model->save())
	// 			{
	// 				// $this->redirect(array('view','id'=>$model->id));
	// 				Yii::app()->user->setFlash('success', '密码修改成功! <a href="/">返回首页</a>');
	// 				$this->refresh();
	// 			}
	// 		}

	// 		$this->render('changepassword',array(
	// 			'model'=>$model,
	// 		));
	// 	}
	// }

	public function actionLogin()
	{	
		$this->layout='/layouts/column1';
		$model=new LoginForm;

		if (!Yii::app()->user->isGuest) {
			$this->redirect('/backend');
		}

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect('/backend');
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionMcode($username,$callback){
        $res=OssMobile::send($username);
        echo $callback,'(',json_encode($res),')';
    }
	//生成随机字符串
    // public static function randomKey($hash_salt_length){
    //     $salt = "";
    //     $index = 0;
    //     $sl = $hash_salt_length;

    //     $letters = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','R','S','T','U','V','Z','0','1','2','3','4','5','6','7','8','9');
    //     for($i=0;$i<$sl;$i++){
    //             $index = mt_rand(0, count($letters)-1);
    //             $salt.= ($index % 2)==0 ? $letters[$index] : strtolower($letters[$index]);

    //     }
    //     return $salt;
    // }
}
