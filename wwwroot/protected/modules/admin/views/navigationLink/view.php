<?php
/* @var $this NavigationLinkController */
/* @var $model NavigationLink */

$this->breadcrumbs=array(
	'Navigation Links'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List NavigationLink', 'url'=>array('index')),
	array('label'=>'Create NavigationLink', 'url'=>array('create')),
	array('label'=>'Update NavigationLink', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete NavigationLink', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NavigationLink', 'url'=>array('admin')),
);
?>

<h1>View NavigationLink #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'site_id',
		'name',
		'url',
		'target',
		'order_count',
	),
)); ?>
