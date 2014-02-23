<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php ?></title>
    <link rel="stylesheet" type="text/css" href="./index_files/layer.css">
    <meta name="keywords" content="体育培训,户外培训,培训课程,户外运动,体育器材,健身器材,拓展器材,游乐设备">
    <meta name="description" content="江西探索户外运动发展有限公司是目前江西体验式培训公司之一，致力于为国内外企业提供具有现代管理观念与技能的高级培训课程">
    <link href="./index_files/css.css" rel="stylesheet" type="text/css">
    <link href="./css/zzsc.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="./index_files/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.SuperSlide.js"></script>
    <script type="text/javascript" src="./index_files/index.js"></script>
    <script src="./index_files/layer.js" type="text/javascript"></script>
    <script src="./index_files/public.js" type="text/javascript"></script>
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
        <?php
                $count = min(count($data['position_data'][8]), 1);
                for($i=0; $i<$count; $i++){
        ?>
        <a href="<?php echo $data['position_data'][8][$i]['url'];?>" title="<?php echo $data['position_data'][8][$i]['title'];?>" class="top_banner">
          <img src="<?php echo $data['position_data'][8][$i]['thumbnail'];?>" alt="<?php echo $data['position_data'][8][$i]['description'];?>" />
        </a>
                <?php
                }
                ?>

        <a href="#" class="logo" title="江西省探索户外运动发展有限公司">
          <img src="./images/logo-01.png" alt="江西省探索户外运动发展有限公司">
        </a>
        <img class="tips" src="./images/logo-02.png" alt="体验式培训专家，在快乐中体验，在体验中学习">
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
      <div class="description">
        <h3><em><?php echo $data['position'][1]['title']; ?></em></h3>
        <div class="content">
          <?php
          $count = min(count($data['position_data'][1]), 1);
          for($i=0; $i<$count; $i++){
              echo $data['position_data'][1][$i]['content'];
          }
          ?>
        </div>
      </div>
      <div class="focusBox" style="margin:10px auto">
        <ul class="pic" style="position: relative; width: 640px; height: 240px;">
        <?php
            $count = min(count($data['index_slide']), 6);
            for($i=0; $i<$count; $i++){
        ?>
          <li style="position: absolute; width: 640px; left: 0px; top: 0px; display: none;">
            <a href="<?php echo $data['index_slide'][$i]['url'];?>" target="_blank"><img src="<?php echo $data['index_slide'][$i]['image_path'];?>" /></a>
          </li>
        <?php
            }
        ?>
        </ul>
        <div class="txt-bg">
        </div>
        <div class="txt">
          <ul>
        <?php
            $count = min(count($data['index_slide']), 6);
            for($i=0; $i<$count; $i++){
        ?>
            <li style="bottom: -36px;"><a href="<?php echo $data['index_slide'][$i]['url'];?>"><?php echo $data['index_slide'][$i]['title'];?></a></li>
        <?php
            }
        ?>
          </ul>
        </div>
        <ul class="num">
        <?php
            $count = min(count($data['index_slide']), 6);
            for($i=0; $i<$count; $i++){
        ?>
          <li class=""><a> <?php echo $i+1;?> </a><span></span></li>
        <?php
            }
        ?>
        </ul>
      </div>
      <script type="text/javascript">
        jQuery(".focusBox").slide({
          titCell: ".num li",
          mainCell: ".pic",
          effect: "fold",
          autoPlay: true,
          trigger: "click",
          startFun: function(i) {
            jQuery(".focusBox .txt li").eq(i).animate({
              "bottom": 0
            }).siblings().animate({
              "bottom": -36
            })
          }
        });
      </script>
    </div>
    <div class="cbox">
    </div>
    <div class="cbox">
      <div class="left">
        <div class="company">
          <div class="company_left">
            <h4>
              <em>
                <?php echo $data['position'][2]['title']; ?>
              </em>
              <a href="<?php echo $data['position_data'][2]['url']; ?>" class="more">
                更多&gt;&gt;
              </a>
            </h4>
            <div class="company_left_box">
            <?php
            $count = min(count($data['position_data'][2]), 1);
            for($i=0; $i<$count; $i++){
                echo $data['position_data'][2][$i]['content'];
            }
            ?>
            </div>
          </div>
          <div class="company_left company_right">
            <h4>
              <em><?php echo $data['position'][3]['title']; ?></em>
              <a href="<?php echo $data['position_data'][3]['url']; ?>" class="more">
                更多&gt;&gt;
              </a>
            </h4>
            <div class="company_left_box company_right_box">
            <?php
            $count = min(count($data['position_data'][3]), 1);
            for($i=0; $i<$count; $i++){
                echo $data['position_data'][3][$i]['content'];
            }
            ?>
            </div>
          </div>
        </div>
      </div>
      <div class="right">
        <h5>
          <em><?php echo $data['position'][4]['title']; ?></em>
          <a href="<?php echo $data['position'][4]['url']; ?>" target="_blank">更多</a>
        </h5>
        <ul class="new_list" style="height:182px;_height:185px;  border-bottom:1px solid #e5e5e5;">
        <?php
            $count = min(count($data['position_data'][4]), 8);
            for($i=0; $i<$count; $i++){
        ?>
          <li>
            <a href="<?php echo $data['position_data'][4][$i]['url']; ?>" target="_blank" title="<?php echo $data['position_data'][4][$i]['description']; ?> "><?php echo $data['position_data'][4][$i]['title']; ?></a>
          </li>
        <?php
            }
        ?>
        </ul>
      </div>
    </div>
    <div class="cbox">
      <div class="hot">
        <h3>
          <em><?php echo $data['position'][5]['title']; ?></em>
          <a class="more" href="<?php echo $data['position'][5]['url']; ?>" alt="<?php echo $data['position'][5]['description']; ?>" target="_blank">更多&gt;&gt;</a>
        </h3>
        <div class="list">
        <?php
            $count = min(count($data['position_data'][5]), 6);
            for($i=0; $i<$count; $i++){
        ?>
          <div class="item">
            <div class="left">
              <a href="<?php echo $data['position_data'][5][$i]['url']; ?>"><img src="<?php echo $data['position_data'][5][$i]['thumbnail']; ?>" /></a>
            </div>
            <div class="right">
              <h5><a href="<?php echo $data['position_data'][5][$i]['url']; ?>"><?php echo $data['position_data'][5][$i]['title']; ?></a></h5>
              <span><?php echo $data['position_data'][5][$i]['description']; ?></span>
            </div>
          </div>
        <?php
            }
        ?>
        </div>
      </div>
    </div>
    <div class="cbox">
      <div class="teacher">
        <?php
            $count = min(count($data['position_data'][6]), 1);
            for($i=0; $i<$count; $i++){
        ?>
        <div class="left">
          <a href="<?php echo $data['position_data'][6][$i]['url']; ?>"><img src="<?php echo $data['position_data'][6][$i]['thumbnail']; ?>" /></a>
        </div>
        <div class="right">
          <h5>
            <a href="<?php echo $data['position_data'][6][$i]['url']; ?>"><?php echo $data['position_data'][6][$i]['title']; ?></a>
          </h5>
          <span><?php echo $data['position_data'][6][$i]['description']; ?></span>
        </div>
        <?php
            }
        ?>
      </div>
      <div class="others">
        <div id="demo">
          <div id="indemo">
            <div id="demo1">
            <?php
                $count = min(count($data['position_data'][7]), 10);
                for($i=0; $i<$count; $i++){
            ?>
              <a href="<?php echo $data['position_data'][7][$i]['url']; ?>">
                <img src="<?php echo $data['position_data'][7][$i]['thumbnail']; ?>" alt="<?php echo $data['position_data'][6][$i]['title']; ?>" border="0" />
              </a>
            <?php
                }
            ?>
            </div>
            <div id="demo2">
            </div>
          </div>
        </div>
        <script>
          var speed = 20;
          var tab = document.getElementById("demo");
          var tab1 = document.getElementById("demo1");
          var tab2 = document.getElementById("demo2");
          tab2.innerHTML = tab1.innerHTML;
          function Marquee() {
            if (tab2.offsetWidth - tab.scrollLeft <= 0) tab.scrollLeft -= tab1.offsetWidth
            else {
              tab.scrollLeft++
            }
          }
          var MyMar = setInterval(Marquee, speed);
          tab.onmouseover = function() {
            clearInterval(MyMar)
          };
          tab.onmouseout = function() {
            MyMar = setInterval(Marquee, speed)
          };
        </script>
      </div>
    </div>
    <div class="cbox">
      <div class="link">
          <b>友情链接：</b>
            <?php
                $count = count($data['friend_link']);
                for($i=0; $i<$count; $i++){
            ?>
          <a href="<?php echo $data['friend_link'][$i]['url']; ?>" target="_blank"><?php echo $data['friend_link'][$i]['name']; ?></a> | 
            <?php
                }
            ?>
          <a href="http://www.qiyehui.com.cn/" target="_blank">企业汇</a>
      </div>
    </div>
    <script type="text/javascript">
      $(function() {
        var getSet1;
        autoScoll_1 = function() {
          $("#cgal ul li").eq(0).animate({
            'margin-left': '-169'
          },
          "slow",
          function() {
            $(this).remove()
          });
          $("#cgal ul ").append($("#cgal ul li").eq(0).clone());
          $("#cgal ul li:last").css({
            width: 149,
            'margin-right': 20
          })
        }
        if ($("#cgal ul li").length > 4) {
          getSet1 = setInterval('autoScoll_1()', 3000)
        };
        var getSet;
        autoScoll_2 = function() {
          $("#tzkc ul li").eq(0).animate({
            'margin-left': '-169'
          },
          "slow",
          function() {
            $(this).remove()
          });
          $("#tzkc ul").append($("#tzkc ul li").eq(0).clone());
          $("#tzkc ul li:last").css({
            width: 149,
            'margin-right': 20
          })
        }
        if ($("#tzkc ul li").length > 4) {
          getSet = setInterval('autoScoll_2()', 3000)
        }
      })
    </script>

<?php require dirname(__FILE__).'/footer.php';?>

    <style type="text/css">
      *html{overflow-x:hidden}*html#shop_kefu{position:absolute;_top:expression(documentElement.scrollTop+100+"px")}*html#shop_kefu_list{position:absolute;_top:expression(documentElement.scrollTop+100+"px")}#shop_kefu{width:30px;overflow:hidden;position:fixed;_position:absolute;height:105px;display:block;background:url(../../images/shop_kefu/kefu1/all_png.png)no-repeat-1px-67px;right:0px;top:100px;z-index:9999;cursor:pointer}#shop_kefu_list{width:132px;padding-bottom:15px;display:block;position:fixed;_position:absolute;right:1px;_right:0px;top:100px;z-index:9999;display:none}#shop_kefu_top{height:31px;width:132px;background:url(../../images/shop_kefu/kefu1/all_png.png)no-repeat
      0 0}#shop_kefu_list ul{border:1px solid#febb90;_ width:117px;_margin-top:-1px;border-bottom:none;padding:2px
      6px;border-top:none;background:#FFF}#shop_kefu_list ul li{line-height:32px;border-bottom:1px
      solid#febb90}#shop_kefu_list ul li a em{height:32px;line-height:32px;display:block;width:40px;background:url(../../images/shop_kefu/kefu1/all_png.png)no-repeat-148px-106px;float:left}#shop_kefu_list.shop_kefu_tel{background:#FFF;_width:129px;line-height:20px;font-size:14px;color:#ff4e00;text-align:center;font-weight:bold;border:1px
      solid#febb90;border-bottom:none;border-top:none}#shop_kefu_list.shop_kefu_msg{_width:99px;height:30px;display:block;background:url(../../images/shop_kefu/kefu1/all_png.png)#fff
      no-repeat-100px-135px;border:1px solid#febb90;border-top:none;padding:15px}
    </style>
    <div id="shop_kefu" style="background-image: url(http://www.tansuosport.com/images/shop_kefu/kefu1/all_png.png); display: block; background-position: -1px -67px; background-repeat: no-repeat no-repeat;">
    </div>
    <div id="shop_kefu_list" style="display: none;">
      <div id="shop_kefu_top">
      </div>
      <ul>
        <li>
          <a href="#">
            <em>
            </em>
            <span>
              客服一号
            </span>
          </a>
        </li>
        <div class="c_5">
        </div>
      </ul>
      <p class="shop_kefu_tel">
        0791-88119398
      </p>
      <a href="#" target="_blank" class="shop_kefu_msg">
      </a>
      <script type="text/javascript">
        $(function() {
          $('#shop_kefu').mouseenter(function() {
            $(this).css({
              background: 'url(../../images/shop_kefu/kefu1/all_png.png) no-repeat -35px -67px'
            })
          }).mouseleave(function() {
            $(this).css({
              background: 'url(../../images/shop_kefu/kefu1/all_png.png) no-repeat -1px -67px'
            })
          });
          $('#shop_kefu').mouseenter(function() {
            $(this).hide();
            $('#shop_kefu_list').show(100)
          });
          $('#shop_kefu_list').mouseleave(function() {
            $('#shop_kefu_list').hide(100);
            $('#shop_kefu').show(100)
          });
          $('#shop_kefu_top').mouseenter(function() {
            $(this).css({
              background: 'url(../../images/shop_kefu/kefu1/all_png.png) no-repeat -132px 0'
            })
          }).mouseleave(function() {
            $(this).css({
              background: 'url(../../images/shop_kefu/kefu1/all_png.png) no-repeat 0 0'
            })
          })
        })
      </script>
    </div>
  </body>

</html>
