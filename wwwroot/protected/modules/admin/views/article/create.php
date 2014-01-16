<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->breadcrumbs=array(
	'Articles'=>array('index'),
	'Create',
);
?>

<h1>Create Article</h1>

<?php $this->renderPartial('/article/_form', array('model'=>$model)); ?>