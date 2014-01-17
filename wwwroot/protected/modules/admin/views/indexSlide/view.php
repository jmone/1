<?php
/* @var $this IndexSlideController */
/* @var $model IndexSlide */

$this->breadcrumbs=array(
	'Index Slides'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List IndexSlide', 'url'=>array('index')),
	array('label'=>'Create IndexSlide', 'url'=>array('create')),
	array('label'=>'Update IndexSlide', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete IndexSlide', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage IndexSlide', 'url'=>array('admin')),
);
?>

<h1>View IndexSlide #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'site_id',
		'title',
		'image_path',
		'url',
		'order_count',
		'dateline',
	),
)); ?>
