<?php

class SettingController extends RController
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
		$this->siteid = intval($_GET['siteid']);
		//判断该站点是否属于该用户
		$this->uid = intval(Yii::app()->user->getId());
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

	public function actionIndex(){
		$model=Site::model()->findByPk($this->siteid);
		$this->render('/site/setting',array(
			'model'=>$model,
		));
	}
	public function actionUpdate(){
		$model=Site::model()->findByPk($this->siteid);
		$this->render('/site/setting',array(
			'model'=>$model,
		));
	}
	public function actionArticle(){
		$model=new Article('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Article']))
			$model->attributes=$_GET['Article'];

		$this->render('/article/admin',array(
			'model'=>$model,
            'siteid' =>  $this->siteid,
		));
	}
	public function actionCreateArticle(){
		$model=new Article;

		if(isset($_POST['Article'])){
			$model->attributes=$_POST['Article'];
			if($model->save()){
				$this->redirect(array('/admin/view/article','id'=>$model->id));
            }
		}

		$this->render('/article/create',array(
			'model'=>$model,
		));
	}
	public function actionArticleCategory(){
		$model=new ArticleCategory('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ArticleCategory']))
			$model->attributes=$_GET['ArticleCategory'];

		$this->render('/articleCategory/admin',array(
			'model'=>$model,
            'siteid' =>  $this->siteid,
		));
	}
	public function actionCreateArticleCategory(){
		$model=new ArticleCategory;
        $model->setAttribute('site_id', $this->siteid);

		if(isset($_POST['ArticleCategory'])){
			$model->attributes=$_POST['ArticleCategory'];
			if($model->save()){
				$this->redirect(array('/admin/view/articleCategory','id'=>$model->id,'siteid'=>$this->siteid));
            }
		}

		$this->render('/articleCategory/create',array(
			'model'=>$model,
		));
	}
	public function actionViewArticleCategory($id)
	{
		$model=ArticleCategory::model()->findByPk($id);
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
        }
        
		$this->render('/articleCategory/view',array(
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
            'siteid' =>  $this->siteid,
		));
	}
	public function actionCreateFriendLink(){
		$model=new FriendLink;

		if(isset($_POST['FriendLink'])){
			$model->attributes=$_POST['FriendLink'];
			if($model->save()){
				$this->redirect(array('/admin/view/friendLink','id'=>$model->id));
            }
		}

		$this->render('/friendLink/create',array(
			'model'=>$model,
		));
	}
	public function actionJob(){
		$model=new Job('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Job'])){
			$model->attributes=$_GET['Job'];
        }

		$this->render('/job/admin',array(
			'model'=>$model,
            'siteid' =>  $this->siteid,
		));
	}
	public function actionCreateJob(){
		$model=new Job;

		if(isset($_POST['Job'])){
			$model->attributes=$_POST['Job'];
			if($model->save()){
				$this->redirect(array('/admin/view/job','id'=>$model->id));
            }
		}

		$this->render('/job/create',array(
			'model'=>$model,
		));
	}
	public function actionIndexSlide(){
		$model=new IndexSlide('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['IndexSlide'])){
			$model->attributes=$_GET['IndexSlide'];
        }

		$this->render('/indexSlide/admin',array(
			'model'=>$model,
            'siteid' =>  $this->siteid,
		));
	}
	public function actionCreateIndexSlide(){
		$model=new IndexSlide;

		if(isset($_POST['IndexSlide'])){
			$model->attributes=$_POST['IndexSlide'];
			if($model->save()){
				$this->redirect(array('/admin/setting/indexSlide','siteid'=>$this->siteid));
            }
		}

		$this->render('/indexSlide/create',array(
			'model'=>$model,
		));
	}
	public function actionNavigationLink(){
		$model=new NavigationLink('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NavigationLink'])){
			$model->attributes=$_GET['NavigationLink'];
        }

		$this->render('/navigationLink/admin',array(
			'model'=>$model,
            'siteid' =>  $this->siteid,
		));
	}
	public function actionCreateNavigationLink(){
		$model=new NavigationLink;

		if(isset($_POST['NavigationLink'])){
			$model->attributes=$_POST['NavigationLink'];
			if($model->save()){
				$this->redirect(array('/admin/setting/navigationLink','siteid'=>$this->siteid));
            }
		}

		$this->render('/navigationLink/create',array(
			'model'=>$model,
		));
	}
}
