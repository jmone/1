<?php
/* @var $this FriendLinkController */
/* @var $model FriendLink */

$this->breadcrumbs=array(
	'Friend Links'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FriendLink', 'url'=>array('index')),
	array('label'=>'Create FriendLink', 'url'=>array('create')),
	array('label'=>'View FriendLink', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FriendLink', 'url'=>array('admin')),
);
?>

<h1>Update FriendLink <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>