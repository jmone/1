<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>江西省探索户外运动发展有限公司</title>
    <link rel="stylesheet" type="text/css" href="./index_files/layer.css">
    <meta name="keywords" content="体育培训,户外培训,培训课程,户外运动,体育器材,健身器材,拓展器材,游乐设备">
    <meta name="description" content="江西探索户外运动发展有限公司是目前江西体验式培训公司之一，致力于为国内外企业提供具有现代管理观念与技能的高级培训课程">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/index_files/css.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/zzsc.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/index_files/jquery.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.SuperSlide.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/index_files/index.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/index_files/layer.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/index_files/public.js" type="text/javascript"></script>
    <!--[if IE 6]>
      <script type="text/javascript" src="http://www.tansuosport.com/js/png.js"></script>
      <script type="text/javascript">
        DD_belatedPNG.fix('*');
      </script>
    <![endif]-->
  </head>
  
  <body>
    <div class="cbox" style=" margin-top:7px;">
      <div class="top">
        <a href="#" class="logo" title="江西省探索户外运动发展有限公司">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-01.png" alt="江西省探索户外运动发展有限公司">
        </a>
        <img class="tips" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-02.png" alt="体验式培训专家，在快乐中体验，在体验中学习">
      </div>
      <div class="c_20"></div>
      <div class="nav">
        <?php
        $count = count($data['navigation_link']);
        for($i=0; $i<$count; $i++){
        ?>
          <a href="<?php echo $data['navigation_link'][$i]['url']; ?>" target="<?php echo $data['navigation_link'][$i]['target']; ?>"><?php echo $data['navigation_link'][$i]['name']; ?></a>
        <?php
        }
        ?>
        <span id="nav_a_bg" style="left: 30px; width: 90px;"></span>
      </div>
    </div>


    <div class="cbox">
      <div class="public_left">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/list_files/05.jpg" />
        <ul id="kclb">
        <?php
        $count = count($data['category']);
        for($i=0; $i<$count; $i++){
        ?>
        <?php 
        if($data['category'][$i]['parent_id'] == 0){
        ?>
          <li<?php if($data['category'][$i]['id'] == Yii::app()->request->getParam('id')){echo ' class="now_li"';} ?>><a href="/frontend/index/parent/id/<?php echo $data['category'][$i]['id']; ?>"><strong><?php echo $data['category'][$i]['name']; ?></strong></a></li>
        <?php
        }else{
        ?>
          <li<?php if($data['category'][$i]['id'] == Yii::app()->request->getParam('id')){echo ' class="now_li"';} ?>><a href="/frontend/index/list/id/<?php echo $data['category'][$i]['id']; ?>"><?php echo $data['category'][$i]['name']; ?></a></li>
        <?php
        }
        ?>
        <?php
        }
        ?>
        </ul>
        <div class="c_10"></div>
        <a href="#" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/list_files/contact.png" alt="联系我们"></a>
        <div class="c_10"></div>
        <a href="#" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/list_files/message.jpg" alt="给我留言"></a>
      </div>

      <div class="public_right">
	<!--面包屑导航-->
        <h3 class="site">
          <span>
            当前位置：<a href="#">首页</a>&nbsp;&gt;&nbsp;<a href="#">户外运动</a>&nbsp;&gt;&nbsp;<a href="javascript:;">定向</a>
          </span>
        </h3>
        <div class="c"></div>
	<!--标题区-->
	<div class="title_area">
		<div class="title"><?php echo $data['article']['title']; ?></div>
		<div class="stat">发表时间 <?php echo date('Y-m-d H:i', $data['article']['dateline']); ?> | 浏览 <?php echo $data['article']['view_count']; ?> 次</div>
	</div>
        <div class="c"></div>
	<!--内容-->
	<div class="article_area">
        <?php echo $data['article']['content']; ?>
    </div>
        <div class="c"></div>
	<!--内容-->
        <div class="share_area"><div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a title="分享到QQ空间" href="#" class="bds_qzone" data-cmd="qzone"></a><a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a><a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a><a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a><a title="分享到网易微博" href="#" class="bds_t163" data-cmd="t163"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","t163"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","t163"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=86835285.js?cdnversion='+~(-new Date()/36e5)];</script></div>
    </div>
    </div>
<?php require dirname(__FILE__).'/footer.php';?>
  </body>

</html>
