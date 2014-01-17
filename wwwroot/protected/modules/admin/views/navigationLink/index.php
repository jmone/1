<?php
/* @var $this NavigationLinkController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Navigation Links',
);

$this->menu=array(
	array('label'=>'Create NavigationLink', 'url'=>array('create')),
	array('label'=>'Manage NavigationLink', 'url'=>array('admin')),
);
?>

<h1>Navigation Links</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
