<?php
/* @var $this PositionDataController */
/* @var $model PositionData */

$this->breadcrumbs=array(
	'Position Datas'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>Update PositionData <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>