<?php
/**
 * jiangming
 */
class IndexController extends Controller
{
    public $layout = '/hipeak/main';
    public $siteid = 0;
    private $data = array();


    public function init() {
        parent::init();
        header('Content-type:text/html; charset=utf-8');
        //通过域名取得siteid
        $this->siteid = 1;
        //取得本站配置
        $this->data['config'] = Yii::app()->db->createCommand()
                ->select('*')
                ->from('site')
                ->where('id = :siteid', array(
                    ':siteid' => $this->siteid,
                ))->queryRow();
        //取得本站导航链接
        $this->data['navigation_link'] = Yii::app()->db->createCommand()
                ->select('*')
                ->from('navigation_link')
                ->where('site_id = :siteid', array(
                    ':siteid' => $this->siteid,
                ))->queryAll();
    }

    public function actionIndex(){
        //取得首页幻灯片
        $this->data['index_slide'] = Yii::app()->db->createCommand()
                ->select('*')
                ->from('index_slide')
                ->where('site_id = :siteid', array(
                    ':siteid' => $this->siteid,
                ))->queryAll();
        
        //取得本站所有推荐信息
        $positions = Yii::app()->db->createCommand()
                ->select('*')
                ->from('position')
                ->where('site_id = :siteid', array(
                    ':siteid' => $this->siteid,
                ))->queryAll();
        if(count($positions)){
            foreach ($positions as $position) {
                $this->data['position'][$position['id']] = $position;
                $positionIds[] = $position['id'];
            }
            
            $position_datas = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('position_data')
                    ->where(array(
                        'in',
                        'position_id',
                        $positionIds,
                    ))->queryAll();
            if(count($position_datas)){
                foreach ($position_datas as $position_data) {
                    $this->data['position_data'][$position_data['position_id']][] = $position_data;
                }
            }
        }
        //获取本站友情链接
        $this->data['friend_link'] = Yii::app()->db->createCommand()
                ->select('*')
                ->from('friend_link')
                ->where('site_id = :siteid', array(
                    ':siteid' => $this->siteid,
                ))->queryAll();
        
        //print_r($this->data);
		$this->render('/hipeak/index', array(
            'data' => $this->data,
        ));
	}
    
	public function actionParent(){
        $id = intval(Yii::app()->request->getParam('id'));
        //获取该分类及子分类信息
        $categoryData = Yii::app()->db->createCommand()
                ->select('*')
                ->from('article_category')
                ->where('site_id = :siteid and (id =:id or parent_id = :id)', array(
                    ':siteid' => $this->siteid,
                    ':id' => $id,
                ))->queryAll();
        if(empty($categoryData)){
            die('Category not exists!');
        }
        foreach ($categoryData as $data) {
            if($data['id'] == $id){
                $this->data['article_category']['data'] = $data;
            }else{
                $this->data['article_category']['subcategory'][] = $data;
                //抽取该分类下的最新6篇文章，此处每次都一次数据库查询不合理
                $this->data['article_category']['article'][$data['id']] = Yii::app()->db->createCommand()
                        ->select('*')
                        ->from('article')
                        ->where('category_id = :categoryId', array(
                            ':categoryId' => $data['id'],
                        ))->order('id DESC')->limit(6)->queryAll();
            }
        }
        
        //获取分类推荐幻灯图
        $this->data['article_category_slide'] = Yii::app()->db->createCommand()
                ->select('*')
                ->from('article_category_slide')
                ->where('category_id = :id', array(
                    ':id' => $id,
                ))->order('id DESC')->limit(6)->queryAll();
        
		$this->render('/hipeak/parent', array(
            'data' => $this->data,
        ));
	}
    
	public function actionList(){
        $id = intval(Yii::app()->request->getParam('id'));
        //获取该分类的信息
        $this->data['current_category'] = $current_category = Yii::app()->db->createCommand()
                ->select('*')
                ->from('article_category')
                ->where('id = :id AND site_id = :siteid', array(
                    ':siteid' => $this->siteid,
                    ':id' => $id,
                ))->queryRow();
        if(empty($current_category)){
            echo 'This category not exists!';
            Yii::app()->end();
        }
        
        //获取该分类平行分类及上级分类
        $this->data['category'] = Yii::app()->db->createCommand()
                ->select('*')
                ->from('article_category')
                ->where('site_id = :siteid and (id =:id or parent_id = :id)', array(
                    ':siteid' => $this->siteid,
                    ':id' => $current_category['parent_id'],
                ))->queryAll();
        
        //获取该分类下的文章
        $page = intval(Yii::app()->request->getParam('page'));
        $this->data['article'] = Yii::app()->db->createCommand()
                ->select('*')
                ->from('article')
                ->where('category_id = :categoryId', array(
                    ':categoryId' => $id,
                ))->order('id DESC')->limit(10)->queryAll();
        
        //获取分类推荐幻灯图
        $this->data['article_category_slide'] = Yii::app()->db->createCommand()
                ->select('*')
                ->from('article_category_slide')
                ->where('category_id = :id', array(
                    ':id' => $id,
                ))->order('id DESC')->limit(6)->queryAll();
        
		$this->render('/hipeak/list', array(
            'data' => $this->data,
        ));
	}
    
	public function actionArticle(){
        $id = intval(Yii::app()->request->getParam('id'));
        //获取文章信息
        $this->data['article'] = Yii::app()->db->createCommand()
                ->select('*')
                ->from('article')
                ->where('id = :id', array(
                    ':id' => $id,
                ))->queryRow();
        if(empty($this->data['article'])){
            echo 'This article not exists!';
            Yii::app()->end();
        }
        
        //获取该分类的信息
        $this->data['current_category'] = Yii::app()->db->createCommand()
                ->select('*')
                ->from('article_category')
                ->where('id = :id AND site_id = :siteid', array(
                    ':siteid' => $this->siteid,
                    ':id' => $this->data['article']['category_id'],
                ))->queryRow();
        
        //获取该分类平行分类及上级分类
        $this->data['category'] = Yii::app()->db->createCommand()
                ->select('*')
                ->from('article_category')
                ->where('site_id = :siteid and (id =:id or parent_id = :id)', array(
                    ':siteid' => $this->siteid,
                    ':id' => $this->data['current_category']['parent_id'],
                ))->queryAll();
        
        //更新浏览次数
        Yii::app()->db->createCommand()
                ->update('article', array(
                    'view_count' => new CDbExpression('view_count+1'),
                ), 'id=:id', array(':id'=>$id));
        
		$this->render('/hipeak/article', array(
            'data' => $this->data,
        ));
	}
}
?>