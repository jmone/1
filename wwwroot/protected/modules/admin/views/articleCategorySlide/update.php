<?php
/* @var $this ArticleCategorySlideController */
/* @var $model ArticleCategorySlide */

$this->breadcrumbs=array(
	'Article Category Slides'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ArticleCategorySlide', 'url'=>array('index')),
	array('label'=>'Create ArticleCategorySlide', 'url'=>array('create')),
	array('label'=>'View ArticleCategorySlide', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ArticleCategorySlide', 'url'=>array('admin')),
);
?>

<h1>Update ArticleCategorySlide <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>