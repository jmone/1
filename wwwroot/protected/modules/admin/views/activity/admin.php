<?php
/* @var $this ActivityController */
/* @var $model Activity */

$this->breadcrumbs = array(
    'Activities' => array('index'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#activity-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理活动</h1>

<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'label' => '添加',
    'icon' => 'plus white',
    'type' => 'primary',
    'size' => 'normal',
    'url' => array('create'),
    'htmlOptions' => array('style' => 'margin-right:10px')
));
?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'activity-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        array(
            'name' => 'name',
            'value' => 'CHtml::link($data->name,"/backend/apply/admin/activityId/".$data->id)',
            'type' => 'raw',
        ),
        array(
            'name' => 'status',
            'value' => '$data->status==0?"关闭":($data->status==1?"开启":"删除")',
            'filter' => array('0' => '关闭', '1' => '开启', '2' => '删除'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
