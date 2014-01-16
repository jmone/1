<?php
/* @var $this ArticleCategoryController */
/* @var $model ArticleCategory */

$this->breadcrumbs=array(
	'Article Categories'=>array('index'),
	'Create',
);
?>

<h1>Create ArticleCategory</h1>

<?php $this->renderPartial('/articleCategory/_form', array('model'=>$model)); ?>