// 南博运动器材有限公司
//导航
//导航
$(function(){
	var _site=$("h3").hasClass("site");
	if(_site){
		var _now=$(".site").text();
	}else{	
		var _now=$("title").text();
	}
	var navroll_time=200,_wid,_aleft,_now,_isnav=false;
	var $nav=$(".nav a");
	var sw=$("#nav_a_bg").width();
	//set now_list
	$('#nav_a_bg').show();
	$nav.each(function(m){
		if(_now.indexOf($(this).text())!=-1){
			_isnav=true;
			_wid=$(this).width();
			_aleft=$(this).position().left;
			_now=m;
			$("#nav_a_bg").css({"width":(_wid)}).stop(true).animate({left:_aleft},0);
			return false;
		}else{
			$("#nav_a_bg").css({"width":_wid}).stop(true).animate({left:30},0);
		}
	});
	//nav hover
	$nav.each(function(n){
		$(this).mouseenter(function(){
			var _wid1=$(this).width();
			var _aleft1=$(this).position().left;
			
			$("#nav_a_bg").show().css({"width":_wid1}).stop(true).animate({left:_aleft1},navroll_time,function(){																								
			});
		})	
	});
	$(".nav a").mouseleave(function(){
		if(_isnav){
			$("#nav_a_bg").stop(true).css({"left":_aleft}).css({"width":_wid});
		}else{
			$("#nav_a_bg").css({'width':sw}).stop(true,true).animate({left:30},0);
		}
	});
})
//左部产品类别
$(function(){
	var _txt=$('.site').text();
	$('#kclb li').each(function() {
      	  if(_txt.indexOf($.trim($(this).text()))!=-1)
		{
			$(this).attr('class','now_li');
		}
    });	
})
