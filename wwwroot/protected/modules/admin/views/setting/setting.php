<?php
/* @var $this SiteController */
/* @var $model Site */

$this->breadcrumbs=array(
	'Sites'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>网站设置<h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
