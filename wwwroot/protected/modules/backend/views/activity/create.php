<?php
/* @var $this ActivityController */
/* @var $model Activity */

$this->breadcrumbs=array(
	'Activities'=>array('index'),
	'Create',
);
?>

<h1>创建活动</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>