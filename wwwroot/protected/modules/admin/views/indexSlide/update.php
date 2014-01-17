<?php
/* @var $this IndexSlideController */
/* @var $model IndexSlide */

$this->breadcrumbs=array(
	'Index Slides'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>Update IndexSlide <?php echo $model->id; ?></h1>

<?php $this->renderPartial('/indexSlide/_form', array('model'=>$model)); ?>