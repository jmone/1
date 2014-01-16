<?php
/* @var $this JobController */
/* @var $model Job */

$this->breadcrumbs=array(
	'Jobs'=>array('index'),
	'Create',
);
?>

<h1>Create Job</h1>

<?php $this->renderPartial('/job/_form', array('model'=>$model)); ?>