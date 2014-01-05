<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php echo "<?php\n"; ?>
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="well-white">
<h1>Manage <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h1>
<hr>
<?php 
echo "<?php\n"; 
echo "\$this->widget('bootstrap.widgets.TbButton', array(
    'label' => '高级搜索',
    'icon' => 'search',
    'type' => 'normal',
    'size' => 'normal',
    'url' => array('#'),
    'htmlOptions'=>array('class'=>'search-button','style'=>'margin-right:10px'),
));
\$this->widget('bootstrap.widgets.TbButton', array(
    'label' => '添加',
    'icon' => 'plus white',
    'type' => 'primary',
    'size' => 'normal',
    'url' => array('create'),
    'htmlOptions'=>array('style'=>'margin-right:10px')
));
?>
\n"; ?>

<div class="search-form" style="display:none">
<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}{update}{delete}'
		),
	),
)); ?>
</div>