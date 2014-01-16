<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->breadcrumbs=array(
	'Articles'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#article-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Articles</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?> &nbsp;
<?php echo CHtml::link('添加文章','/admin/setting/createArticle/siteid/'.$siteid,array('class'=>'')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('/article/_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'article-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'category_id',
		'title',
		'description',
		'content',
		'dateline',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view} {update} {delete}',
			'buttons'=>array(
				'view'=>array(
					'label'=>'查看',
					'icon' =>'share-alt',
					'url' => 'Yii::app()->createUrl("/admin/view/article", array("id" => $data->id))',
					'options' => array('class'=>'sendone'),
				),
				'update'=>array(
					'label'=>'编辑',
					'icon' =>'share-alt',
					'url' => 'Yii::app()->createUrl("/admin/update/article", array("id" => $data->id))',
					'options' => array('class'=>'sendone'),
				),
				'delete'=>array(
					'label'=>'删除',
					'icon' =>'retweet',
					'url' => 'Yii::app()->createUrl("/admin/delete/article", array("id" => $data->id))',
					'options' => array('class'=>'replyone'),
				)
			)
		),
	),
)); ?>
