<?php
/* @var $this ArticleCategorySlideController */
/* @var $model ArticleCategorySlide */

$this->breadcrumbs=array(
	'Article Category Slides'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ArticleCategorySlide', 'url'=>array('index')),
	array('label'=>'Create ArticleCategorySlide', 'url'=>array('create')),
	array('label'=>'Update ArticleCategorySlide', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ArticleCategorySlide', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ArticleCategorySlide', 'url'=>array('admin')),
);
?>

<h1>View ArticleCategorySlide #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_id',
		'title',
		'image_path',
		'url',
		'order_count',
		'dateline',
	),
)); ?>
