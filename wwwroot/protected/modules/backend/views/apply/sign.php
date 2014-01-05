<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dli'>
<html xmlns='http://www.w3.org/1999/xhtml'>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
        <title>
            签到
        </title>
    </head>
    <body>
        <?php
        if ($ms = Yii::app()->user->getFlash('success')) {
            ?>
            <div id="yw0"><div class="alert in alert-block fade alert-success"><a class="close" data-dismiss="alert">×</a><?php echo $ms; ?> </div></div>
            <?php
        } elseif ($ms = Yii::app()->user->getFlash('error')) {
            ?>
            <div id="yw0"><div class="alert in alert-block fade alert-error"><a class="close" data-dismiss="alert">×</a><?php echo $ms; ?> </div></div>
            <?php
        }
        ?>
        <div class="well">
            <h3 style="text-align: center">签到</h3>


            <div style="text-align: center">
                <?php
                $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                    'id' => 'verticalForm',
                    'action' => '/backend/apply/sign',
                ));
                ?>

                <div> 
                    <label for="code" class="required">验证码 <span class="required">*</span></label><input class="span3" value="" style="height:25px;line-height:25px;" name="code" id="code" type="text" />

                </div>
                <div align="center">
                    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'icon' => 'ok', 'label' => '验证','htmlOptions'=>array('class'=>'btn btn-primary'))); ?>
                    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'reset', 'icon' => 'remove', 'label' => '重置')); ?>
                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
        <script type="text/javascript">
            document.getElementById('code').focus();
        </script>
    </body>
</html>
