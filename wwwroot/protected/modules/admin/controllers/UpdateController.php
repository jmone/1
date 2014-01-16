<?php
/**
 * 
 */
class UpdateController extends RController
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
        
        //组织菜单栏
        $this->siteid = $model->attributes['site_id'];
		$this->menu = require 'setting_menu.php';
        
		if(isset($_POST['ArticleCategory'])){
			$model->attributes=$_POST['ArticleCategory'];
			if($model->save()){
				$this->redirect(array('/admin/view/articleCategory','id'=>$model->id));
            }
		}

		$this->render('/articleCategory/update',array(
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
        
        //组织菜单栏
		$categoryModel=ArticleCategory::model()->findByPk($model->attributes['category_id']);
        $this->siteid = $categoryModel->attributes['site_id'];
		$this->menu = require 'setting_menu.php';
        
		if(isset($_POST['Article'])){
			$model->attributes=$_POST['Article'];
			if($model->save()){
				$this->redirect(array('/admin/view/article','id'=>$model->id));
            }
		}

		$this->render('/article/update',array(
			'model'=>$model,
		));
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
        
        //组织菜单栏
        $this->siteid = $model->attributes['site_id'];
		$this->menu = require 'setting_menu.php';
        
		if(isset($_POST['Message'])){
			$model->attributes=$_POST['Message'];
			if($model->save()){
				$this->redirect(array('/admin/view/message','id'=>$model->id));
            }
		}

		$this->render('/message/update',array(
			'model'=>$model,
		));
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
        
        //组织菜单栏
        $this->siteid = $model->attributes['site_id'];
		$this->menu = require 'setting_menu.php';
        
		if(isset($_POST['FriendLink'])){
			$model->attributes=$_POST['FriendLink'];
			if($model->save()){
				$this->redirect(array('/admin/view/friendLink','id'=>$model->id));
            }
		}

		$this->render('/friendLink/update',array(
			'model'=>$model,
		));
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
        
        //组织菜单栏
        $this->siteid = $model->attributes['site_id'];
		$this->menu = require 'setting_menu.php';
        
		if(isset($_POST['Job'])){
			$model->attributes=$_POST['Job'];
			if($model->save()){
				$this->redirect(array('/admin/view/job','id'=>$model->id));
            }
		}

		$this->render('/job/update',array(
			'model'=>$model,
		));
    }
}
?>