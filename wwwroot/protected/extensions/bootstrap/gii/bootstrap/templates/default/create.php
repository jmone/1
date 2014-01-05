<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>

<div class="well-white">
<h1>Create <?php echo $this->modelClass; ?></h1>
<hr>
<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
</div>