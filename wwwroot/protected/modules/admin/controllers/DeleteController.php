<?php
/**
 * 
 */
class DeleteController extends RController
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
        
        //判断是否属于当前管理员
        $data = Yii::app()->db->createCommand()
                ->select('*')
                ->from('site')
                ->where('id=:siteid AND uid=:uid', array(
                    ':siteid' =>  $model->attributes['site_id'],
                    ':uid' => $this->uid,
                ))->queryRow();
        if(empty($data)){
			throw new CHttpException(403,'Access Denied.');
        }
        
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
    public function actionArticle(){
        $id = intval(Yii::app()->request->getParam('id'));
		$model=Article::model()->findByPk($id);
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
        }
        
		$categoryModel=ArticleCategory::model()->findByPk($model->attributes['category_id']);
        //判断是否属于当前管理员
        $data = Yii::app()->db->createCommand()
                ->select('*')
                ->from('site')
                ->where('id=:siteid AND uid=:uid', array(
                    ':siteid' =>  $categoryModel->attributes['site_id'],
                    ':uid' => $this->uid,
                ))->queryRow();
        if(empty($data)){
			throw new CHttpException(403,'Access Denied.');
        }
        
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
    public function actionMessage(){
        $id = intval(Yii::app()->request->getParam('id'));
		$model=Message::model()->findByPk($id);
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
        }
        
        //判断是否属于当前管理员
        $data = Yii::app()->db->createCommand()
                ->select('*')
                ->from('site')
                ->where('id=:siteid AND uid=:uid', array(
                    ':siteid' =>  $model->attributes['site_id'],
                    ':uid' => $this->uid,
                ))->queryRow();
        if(empty($data)){
			throw new CHttpException(403,'Access Denied.');
        }
        
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
    public function actionFriendLink(){
        $id = intval(Yii::app()->request->getParam('id'));
		$model=FriendLink::model()->findByPk($id);
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
        }
        
        //判断是否属于当前管理员
        $data = Yii::app()->db->createCommand()
                ->select('*')
                ->from('site')
                ->where('id=:siteid AND uid=:uid', array(
                    ':siteid' =>  $model->attributes['site_id'],
                    ':uid' => $this->uid,
                ))->queryRow();
        if(empty($data)){
			throw new CHttpException(403,'Access Denied.');
        }
        
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
    public function actionJob(){
        $id = intval(Yii::app()->request->getParam('id'));
		$model=Job::model()->findByPk($id);
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
        }
        
        //判断是否属于当前管理员
        $data = Yii::app()->db->createCommand()
                ->select('*')
                ->from('site')
                ->where('id=:siteid AND uid=:uid', array(
                    ':siteid' =>  $model->attributes['site_id'],
                    ':uid' => $this->uid,
                ))->queryRow();
        if(empty($data)){
			throw new CHttpException(403,'Access Denied.');
        }
        
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
    public function actionIndexSlide(){
        $id = intval(Yii::app()->request->getParam('id'));
		$model=IndexSlide::model()->findByPk($id);
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
        }
        
        //判断是否属于当前管理员
        $data = Yii::app()->db->createCommand()
                ->select('*')
                ->from('site')
                ->where('id=:siteid AND uid=:uid', array(
                    ':siteid' =>  $model->attributes['site_id'],
                    ':uid' => $this->uid,
                ))->queryRow();
        if(empty($data)){
			throw new CHttpException(403,'Access Denied.');
        }
        
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
    public function actionNavigationLink(){
        $id = intval(Yii::app()->request->getParam('id'));
		$model=NavigationLink::model()->findByPk($id);
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
        }
        
        //判断是否属于当前管理员
        $data = Yii::app()->db->createCommand()
                ->select('*')
                ->from('site')
                ->where('id=:siteid AND uid=:uid', array(
                    ':siteid' =>  $model->attributes['site_id'],
                    ':uid' => $this->uid,
                ))->queryRow();
        if(empty($data)){
			throw new CHttpException(403,'Access Denied.');
        }
        
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
}
?>