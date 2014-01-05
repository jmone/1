<?php
/* @var $this ApplyController */
/* @var $model Apply */

$this->breadcrumbs = array(
    'Applies' => array('index'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#apply-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>活动用户管理</h1>



<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'apply-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        array(
            'name' => 'activity_id',
            'value' => '$data->getActivityNameById($data->activity_id)',
            'filter' => $model->getActivityList(),
        ),
        'code',
        'uid',
//        'miid',
        'nickname',
        'phone',
        array(
            'name' => 'sign_dateline',
            'value' => '$data->sign_dateline>0?date("m-d H:i:s",$data->sign_dateline):"未签到"',
        ),
//        array(
//            'name' => 'sign_off_dateline',
//            'value' => '$data->sign_off_dateline>0?date("Y-m-d H:i:s",$data->sign_off_dateline):"未签退"',
//        ),
        array(
            'name' => 'status',
            'value' => '$data->status==0?"未中奖":($data->status==1?"已中奖":"已领取")',
            'filter' => array('0' => '未中奖', '1' => '已中奖', '2' => '已领取'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{resend}',
            'buttons' => array(
                'resend' => array(
                    'label' => '发奖品',
                    'icon' => 'icon-share',
                    'url' => 'Yii::app()->createUrl("/backend/apply/send", array("id" => $data->id))',
                    'options' => array('class' => 'updatestatus'),
                ),
            ),
        ),
    ),
));
?>

<script type="text/javascript">
    $('#apply-grid a.updatestatus').live('click', function() {
        var th = this;
        $.fn.yiiGridView.update('apply-grid', {
            type: 'get',
            url: $(this).attr('href'),
            success: function(data) {
                $.fn.yiiGridView.update('apply-grid');
                if (data == 'success') {
                    alert("发送成功!");
                } else {
                    alert(data);
                }
            },
            error: function() {
            }
        });
        return false;
    });
</script>
