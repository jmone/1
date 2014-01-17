<?php
/* @var $this IndexSlideController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Index Slides',
);

$this->menu=array(
	array('label'=>'Create IndexSlide', 'url'=>array('create')),
	array('label'=>'Manage IndexSlide', 'url'=>array('admin')),
);
?>

<h1>Index Slides</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
