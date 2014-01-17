<?php
/* @var $this PositionController */
/* @var $model Position */

$this->breadcrumbs=array(
	'Positions'=>array('index'),
	'Create',
);
?>

<h1>Create Position</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>