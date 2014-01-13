<?php
/* @var $this FriendLinkController */
/* @var $model FriendLink */

$this->breadcrumbs=array(
	'Friend Links'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FriendLink', 'url'=>array('index')),
	array('label'=>'Manage FriendLink', 'url'=>array('admin')),
);
?>

<h1>Create FriendLink</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>