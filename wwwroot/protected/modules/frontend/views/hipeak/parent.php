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
          <a href="<?php echo $data['navigation_link'][$i]['url']; ?>" target="_blank"><?php echo $data['navigation_link'][$i]['name']; ?></a>
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
        $count = count($data['article_category']['subcategory']);
        for($i=0; $i<$count; $i++){
        ?>
          <li><a href="<?php echo $data['article_category']['subcategory'][$i]['id']; ?>"><?php echo $data['article_category']['subcategory'][$i]['name']; ?></a></li>
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
            <em><?php echo $data['article_category']['data']['name']; ?></em>
          <span>
            当前位置：<a href="#">首页</a>&nbsp;&gt;&nbsp;<a href="#">户外运动</a>&nbsp;&gt;&nbsp;<a href="javascript:;">定向</a>
          </span>
        </h3>
        <div class="c"></div>
	<!--幻灯片-->
	<div class="listFocusPicture" style="margin:10px auto">
        <ul class="pic" style="position: relative; width: 640px; height: 240px;">
        <?php
        $count = count($data['article_category_slide']);
        for($i=0; $i<$count; $i++){
        ?>
          <li style="position: absolute; width: 640px; left: 0px; top: 0px; display: none;">
            <a href="<?php echo $data['article_category_slide'][$i]['url']; ?>" target="_blank">
              <img src="<?php echo $data['article_category_slide'][$i]['image_path']; ?>" />
            </a>
          </li>
        <?php
        }
        ?>
        </ul>
        <div class="txt-bg"></div>
        <div class="txt">
          <ul>
            <?php
            $count = count($data['article_category_slide']);
            for($i=0; $i<$count; $i++){
            ?>
            <li style="bottom: -36px;"><a href="#"><?php echo $data['article_category_slide'][$i]['title']; ?></a></li>
            <?php
            }
            ?>
          </ul>
        </div>
        <ul class="num">
        <?php
        $count = count($data['article_category_slide']);
        for($i=0; $i<$count; $i++){
        ?>
          <li class=""><a> <?php echo $i+1;?> </a><span></span></li>
        <?php
        }
        ?>
        </ul>
      </div>
      <script type="text/javascript">
        jQuery(".listFocusPicture").slide({
          titCell: ".num li",
          mainCell: ".pic",
          effect: "fold",
          autoPlay: true,
          trigger: "click",
          startFun: function(i) {
            jQuery(".listFocusPicture .txt li").eq(i).animate({
              "bottom": 0
            }).siblings().animate({
              "bottom": -36
            })
          }
        });
      </script>
        <div class="c"></div>
	<!--简介-->
	<div class="category_description">
		<div class="title"><?php echo $data['article_category']['data']['name']; ?></div>
		<div class="content"><?php echo $data['article_category']['data']['description']; ?></div>
	</div>
        <div class="c"></div>
    <?php
    $count = count($data['article_category']['subcategory']);
    for($i=0; $i<$count && $i <1; $i++){
    ?>
	<!--竖排列表-->
	<div class="parent_category_1">
        <?php
        $articles = $data['article_category']['article'][$data['article_category']['subcategory'][$i]['id']];
        for($j=0; $j<count($articles) && $j <4; $j++){
        ?>
		<div class="item">
			<div class="left"><a href="<?php echo $articles[$j]['id'];?>" target="_blank"><img src="<?php echo $articles[$j]['image_path'];?>" width="229" height="134" /></a></div>
			<div class="right"><a href="<?php echo $articles[$j]['id'];?>" target="_blank"><?php echo $articles[$j]['title'];?></a><br /><?php echo $articles[$j]['description'];?></div>
		</div>
        <?php
        }
        ?>
		<div class="item_more"><a href="<?php echo $data['article_category']['subcategory'][$i]['id'];?>">点击查看更多</a></div>
	</div>
    <?php
    }
    for(; $i<$count; $i++){
    ?>
	<!--竖排列表-->
	<div class="parent_category_2">
        <?php
        $articles = $data['article_category']['article'][$data['article_category']['subcategory'][$i]['id']];
        for($j=0; $j<count($articles) && $j <6; $j++){
        ?>
        <div class="item<?php if(($j+1)%3==0){echo ' item_last';} ?>">
			<div class="image"><a href="<?php echo $articles[$j]['id'];?>" target="_blank"><img src="<?php echo $articles[$j]['image_path'];?>" width="200" heigh="160" /></a></div>
			<div class="title"><a href="<?php echo $articles[$j]['id'];?>" target="_blank"><?php echo $articles[$j]['title'];?></a></div>
			<div class="description"><?php echo $articles[$j]['description'];?></div>
			<div class="time">发表日期：<?php echo date('Y年m月d日', $articles[$j]['dateline']);?></div>
		</div>
        <?php
        }
        ?>
		<div class="more"><a href="./list.php?<?php echo $data['article_category']['subcategory'][$i]['id'];?>" target="_blank">更多"<?php echo $data['article_category']['subcategory'][$i]['name'];?>"相关内容...</a></div>
    </div>
    <?php
    }
    ?>
	
    </div>
<?php require dirname(__FILE__).'/footer.php';?>

  </body>

</html>
