<?php

/**
 * This is the model class for table "apply".
 *
 * The followings are the available columns in table 'apply':
 * @property integer $id
 * @property integer $activity_id
 * @property string $code
 * @property integer $uid
 * @property integer $miid
 * @property string $nickname
 * @property string $phone
 * @property integer $sign_dateline
 * @property integer $sign_off_dateline
 * @property integer $status
 */
class Apply extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'apply';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('activity_id, code, uid, miid, nickname, phone', 'required'),
			array('activity_id, uid, miid, sign_dateline, sign_off_dateline, status', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>10),
			array('nickname, phone', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, activity_id, code, uid, miid, nickname, phone, sign_dateline, sign_off_dateline, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'activity_id' => '所属活动',
			'code' => '验证码',
			'uid' => '论坛UID',
			'miid' => '米聊号',
			'nickname' => '论坛昵称',
			'phone' => '手机号码',
			'sign_dateline' => '签到时间',
			'sign_off_dateline' => '签退时间',
			'status' => '中奖状态',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('activity_id',$this->activity_id);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('miid',$this->miid);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('sign_dateline',$this->sign_dateline);
		$criteria->compare('sign_off_dateline',$this->sign_off_dateline);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Apply the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getActivityList(){
             $acitvity_list = Yii::app()->db->createCommand()->select('id,name')->from('activity')->queryAll();
             $list = array();
             foreach ($acitvity_list as $a){
                 $list[$a['id']] = $a['name'];
             }
             return $list;
        }
        
        public function getActivityNameById($acitvity_id){
            return Yii::app()->db->createCommand()->select('name')->from('activity')->where('id=:id',array(':id'=>intval($acitvity_id)))->queryScalar();
        }
}
