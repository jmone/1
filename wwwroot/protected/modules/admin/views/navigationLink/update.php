<?php
/* @var $this NavigationLinkController */
/* @var $model NavigationLink */

$this->breadcrumbs=array(
	'Navigation Links'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NavigationLink', 'url'=>array('index')),
	array('label'=>'Create NavigationLink', 'url'=>array('create')),
	array('label'=>'View NavigationLink', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage NavigationLink', 'url'=>array('admin')),
);
?>

<h1>Update NavigationLink <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>