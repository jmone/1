<?php
/* @var $this ArticleCategoryController */
/* @var $model ArticleCategory */

$this->breadcrumbs=array(
	'Article Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>Update ArticleCategory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('/articleCategory/_form', array('model'=>$model)); ?>