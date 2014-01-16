<?php
/* @var $this FriendLinkController */
/* @var $model FriendLink */

$this->breadcrumbs=array(
	'Friend Links'=>array('index'),
	'Create',
);
?>

<h1>Create FriendLink</h1>

<?php $this->renderPartial('/friendLink/_form', array('model'=>$model)); ?>