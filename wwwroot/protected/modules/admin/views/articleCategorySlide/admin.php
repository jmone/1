<?php
/* @var $this ArticleCategorySlideController */
/* @var $model ArticleCategorySlide */

$this->breadcrumbs=array(
	'Article Category Slides'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#article-category-slide-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Article Category Slides</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?> &nbsp;
<?php echo CHtml::link('添加幻灯图','/admin/articleCategorySlide/create/category_id/'.Yii::app()->request->getParam('category_id'),array('class'=>'')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'article-category-slide-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'category_id',
		'title',
		'image_path',
		'url',
		'order_count',
		/*
		'dateline',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view} {update} {delete}',
			'buttons'=>array(
				'view'=>array(
					'label'=>'查看',
					'icon' =>'eye-open',
					'url' => 'Yii::app()->createUrl("/admin/articleCategorySlide/view", array("id" => $data->id, "category_id" => $data->category_id))',
					'options' => array('class'=>'sendone'),
				),
				'update'=>array(
					'label'=>'更新',
					'icon' =>'edit',
					'url' => 'Yii::app()->createUrl("/admin/articleCategorySlide/update", array("id" => $data->id, "category_id" => $data->category_id))',
					'options' => array('class'=>'sendone'),
				),
				'delete'=>array(
					'label'=>'删除',
					'icon' =>'remove',
					'url' => 'Yii::app()->createUrl("/admin/articleCategorySlide/delete", array("id" => $data->id, "category_id" => $data->category_id))',
					'options' => array('class'=>'replyone'),
				)
			)
		),
	),
)); ?>
