<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="utf-8">
            <title><?php echo CHtml::encode($this->pageTitle); ?></title>
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/css/r_yii.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="">
            <meta name="author" content="">

            <!-- Le styles -->
            <style type="text/css">
              body {
                padding-top: 60px;
                padding-bottom: 40px;
                background-color: whiteSmoke;
              }
              .sidebar-nav {
                padding: 9px 0;
              }
            </style>
         
            <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
            <!--[if lt IE 9]>
              <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->

            <!-- Le fav and touch icons -->
      </head>

  <body>
<?php if (!Yii::app()->user->isGuest): ?>
<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'null', // null or 'inverse'
    'brand'=>CHtml::encode(Yii::app()->name),
    'brandUrl'=>'/',
    'collapse'=>true, // requires bootstrap-responsive.css
    'fluid'=>true,
    'fixed'=>'top',
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'后台首页', 'icon'=>'home', 'url'=>'/admin'),
                array('label'=>'网站管理', 'icon'=>'icon-file', 'url'=>'/admin/site'),
                array('label'=>'财务管理', 'icon'=>'icon-tint', 'url'=>'/admin/finance'),
            ),
        ),
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('label'=>'登陆', 'url'=>'/backend/user/login','visible'=>Yii::app()->user->isGuest),
                array('label'=>Yii::app()->user->name, 'icon'=>'user','url'=>'#', 'items'=>array(
                    array('label'=>'管理员帐号', 'icon'=>'user', 'url'=>'/backend/user','visible'=>Yii::app()->getUser()->checkAccess('user')),
                    array('label'=>'权限管理', 'icon'=>'eye-open', 'url'=>'/rights','visible'=>Yii::app()->getUser()->checkAccess('rights')),
                    '---',
                    array('label'=>'退出', 'url'=>'/backend/user/logout'),
                ),'visible'=>!Yii::app()->user->isGuest),
            ),
        ),
    ),
)); ?>
<?php endif ?>
<div class="container-fluid">
<?php echo $content; ?>
<?php if (!Yii::app()->user->isGuest): ?>
      <hr>
      <footer class="pull-right">
        Copyright &copy; <?php echo date('Y'); ?> by SNSDEV.  All Rights Reserved.
      </footer>
<?php endif ?>
    </div><!--/.fluid-container-->
  </body>
</html>
