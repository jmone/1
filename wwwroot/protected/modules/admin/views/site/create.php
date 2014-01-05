<?php
/* @var $this SiteController */
/* @var $model Site */

$this->breadcrumbs=array(
	'Sites'=>array('index'),
	'Create',
);
?>

<h1>Create Site</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
