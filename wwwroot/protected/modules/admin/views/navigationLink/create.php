<?php
/* @var $this NavigationLinkController */
/* @var $model NavigationLink */

$this->breadcrumbs=array(
	'Navigation Links'=>array('index'),
	'Create',
);
?>

<h1>Create NavigationLink</h1>

<?php $this->renderPartial('/navigationLink/_form', array('model'=>$model)); ?>