<?php
/* @var $this PositionDataController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Position Datas',
);
?>

<h1>Position Datas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
