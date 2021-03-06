<?php

/**
 * This is the model class for table "article_category_slide".
 *
 * The followings are the available columns in table 'article_category_slide':
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $image_path
 * @property string $url
 * @property integer $order_count
 * @property integer $dateline
 */
class ArticleCategorySlide extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'article_category_slide';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, title, image_path, url, dateline', 'required'),
			array('category_id, order_count, dateline', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('image_path, url', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, category_id, title, image_path, url, order_count, dateline', 'safe', 'on'=>'search'),
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
			'category_id' => 'Category',
			'title' => 'Title',
			'image_path' => 'Image Path',
			'url' => 'Url',
			'order_count' => 'Order Count',
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
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('image_path',$this->image_path,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('order_count',$this->order_count);
		$criteria->compare('dateline',$this->dateline);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ArticleCategorySlide the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
