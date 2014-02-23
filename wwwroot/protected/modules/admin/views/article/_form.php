<?php
/* @var $this ArticleController */
/* @var $model Article */
/* @var $form CActiveForm */
?>
                <script>
                        var editor;
                        KindEditor.ready(function(K) {
                                editor = K.create('textarea[id="Article_content"]', {
                                        allowFileManager : true
                                });
                        });
                </script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id'); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image_path'); ?>
		<?php echo $form->textField($model,'image_path',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'image_path'); ?>
                <input type="button" id="image1" value="选择图片" />
        </div>

        <div class="row">
                <?php echo $form->labelEx($model,'description'); ?>
                <?php echo $form->textArea($model,'description',array('style'=>'width:800px;height:50px;', 'maxlength'=>200)); ?>
                <?php echo $form->error($model,'description'); ?>
        </div>

        <div class="row">
                <?php echo $form->labelEx($model,'content'); ?>
                <?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50, 'style'=>'width:800px;height:400px;visibility:hidden;')); ?>
                <?php echo $form->error($model,'content'); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'view_count'); ?>
		<?php echo $form->textField($model,'view_count'); ?>
		<?php echo $form->error($model,'view_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateline'); ?>
		<?php echo $form->textField($model,'dateline'); ?>
		<?php echo $form->error($model,'dateline'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
