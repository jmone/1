<?php
/* @var $this ArticleCategorySlideController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Article Category Slides',
);

$this->menu=array(
	array('label'=>'Create ArticleCategorySlide', 'url'=>array('create')),
	array('label'=>'Manage ArticleCategorySlide', 'url'=>array('admin')),
);
?>

<h1>Article Category Slides</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
