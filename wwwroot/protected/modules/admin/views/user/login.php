<div class='well-white login'>
    <div class='loginlogo'>
        登陆
    </div>
    <hr>
    <div class='loginform'>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'login-form',
    'type'=>'inline',
    'enableClientValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array('class'=>''),
)); ?>
            <?php echo $form->textFieldRow($model, 'username', array('class'=>'span3')); ?>
            <?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3')); ?>
        <br>
        <?php if(CCaptcha::checkRequirements()): ?>
            <?php echo $form->textFieldRow($model,'verifyCode', array('class'=>'span1')); ?>
            <?php $this->widget('CCaptcha',array('buttonLabel'=>'刷新', 'clickableImage'=>true)); ?>
        <?php endif; ?>
        <hr>
        <?php echo $form->checkboxRow($model, 'rememberMe'); ?>
        <?php echo $form->errorSummary($model); ?>
        <hr>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'登陆', 'type'=>'primary')); ?>

        <?php $this->endWidget(); ?>
    </div>
</div>
