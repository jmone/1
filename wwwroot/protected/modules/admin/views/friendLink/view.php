<?php
/* @var $this FriendLinkController */
/* @var $model FriendLink */

$this->breadcrumbs=array(
	'Friend Links'=>array('index'),
	$model->name,
);
?>

<h1>View FriendLink #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'site_id',
		'name',
		'logo',
		'url',
		'order_num',
		'dateline',
	),
)); ?>
