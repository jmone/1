<?php
/* @var $this IndexSlideController */
/* @var $model IndexSlide */

$this->breadcrumbs=array(
	'Index Slides'=>array('index'),
	'Create',
);
?>

<h1>Create IndexSlide</h1>

<?php $this->renderPartial('/indexSlide/_form', array('model'=>$model)); ?>