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
        
        print_r($this->data);
		$this->render('/hipeak/index', array(
            'data' => $this->data,
        ));
	}
    
	public function actionParent(){
		$this->render('/hipeak/parent');
	}
    
	public function actionList(){
		$this->render('/hipeak/list');
	}
    
	public function actionArticle(){
		$this->render('/hipeak/article');
	}
}
?>