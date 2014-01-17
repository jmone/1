<?php

/**
 * This is the model class for table "position_data".
 *
 * The followings are the available columns in table 'position_data':
 * @property integer $id
 * @property integer $position_id
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $content
 * @property string $url
 * @property string $thumbnail
 * @property integer $order_count
 * @property integer $click_count
 * @property integer $dateline
 */
class PositionData extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'position_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('position_id, title, url, dateline', 'required'),
			array('position_id, order_count, click_count, dateline', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('keywords, url, thumbnail', 'length', 'max'=>200),
			array('description', 'length', 'max'=>300),
			array('content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, position_id, title, keywords, description, content, url, thumbnail, order_count, click_count, dateline', 'safe', 'on'=>'search'),
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
			'position_id' => 'Position',
			'title' => 'Title',
			'keywords' => 'Keywords',
			'description' => 'Description',
			'content' => 'Content',
			'url' => 'Url',
			'thumbnail' => 'Thumbnail',
			'order_count' => 'Order Count',
			'click_count' => 'Click Count',
			'dateline' => 'Dateline',
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
		$criteria->compare('position_id',$this->position_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('thumbnail',$this->thumbnail,true);
		$criteria->compare('order_count',$this->order_count);
		$criteria->compare('click_count',$this->click_count);
		$criteria->compare('dateline',$this->dateline);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PositionData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
