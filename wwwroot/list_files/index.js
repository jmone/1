// 幻灯 author 朱咸杰
;(function($){  
    $.fn.slider=function(options){  
            var defaults={  
                autoScoll:"true",   //是否自动滚动  
                child:"child",      //获取box的子元素（图片元素）  
                btn:"btn",          //按钮  
                hoverClass:'hover', //按钮hober背景  
                autoTime:2000       //自动滚动时间      
            }         
        var options=$.extend(defaults,options);  
        var _this=$(this);  
        var child=_this.find(options.child);  
        var btn=$("#"+options.btn);  
        var len=child.length;  
        for(var i=0;i<len;i++){btn.append("<a href='#'></a>");}  
        child.not(":first").hide();  
        btn.find('a').eq(0).attr("class",options.hoverClass);  
          
        if(options.autoScoll=="true")  
        {   var i=0;  
            autoScoll=function(){  
                i++;  
                if(i==len){i=0}  
                child.eq(i).show().siblings().hide();  
                btn.find('a').eq(i).attr("class",options.hoverClass).siblings().attr("class","");  
            }  
             set = setInterval(autoScoll,options.autoTime);  
        }  
          
        btn.find('a').mouseenter(function(){  
            clearInterval(set);  
            var index=$(this).index();  
            $(this).attr("class",options.hoverClass).siblings().attr("class","");  
            child.eq(index).show().siblings().hide()  
        }).mouseleave(function(){  
            clearInterval(set);  
            set = setInterval(autoScoll,options.autoTime);  
            })  
              
        child.mouseenter(function(){  
            clearInterval(set);  
        }).mouseleave(function(){  
            set = setInterval(autoScoll,options.autoTime);  
            })  
    }  
})(jQuery)  