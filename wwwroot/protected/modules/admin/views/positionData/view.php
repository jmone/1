<?php
/* @var $this PositionDataController */
/* @var $model PositionData */

$this->breadcrumbs=array(
	'Position Datas'=>array('index'),
	$model->title,
);
?>

<h1>View PositionData #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'position_id',
		'title',
		'keywords',
		'description',
		'url',
		'thumbnail',
		'order_count',
		'click_count',
		'dateline',
	),
)); ?>
