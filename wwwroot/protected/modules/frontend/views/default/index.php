<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $activity['name'];?> - 现场抽奖</title>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.js"></script>
</head>
<body>
<div class="wrap">
    <h1><?php echo $activity['name'];?><strong>抽奖现场</strong></h1>
    <div class="col_l">
        <h2>抽奖区<span>参与人数 <em id="userNum">0</em> 人</span></h2>
        <div class="user_list" id="userList">
            <ul>
                <!--<li>29e39</li>-->
            </ul>
        </div>
        <div class="btns">
            <a class="start" id="startBtn"><span>开始</span></a>
            <a class="reset" id="resetBtn"><span>重置</span></a>
        </div>
        <div class="num">
            请输入抽奖人数 <input type="text" id="count" value="">
        </div>
    </div>
    <div class="col_r">
        <h2>中奖名单<span>共 <em id="luckyNum">0</em> 位幸运者</span></h2>
        <ul>
            <li>
                <span>验证码</span>
                <span>昵称</span>
                <span>手机</span>
            </li>
        </ul>
        <ul class="lucky_list" id="luckyList">
            <!--<li>-->
                <!--<span>29e39</span>-->
                <!--<span>思想鱼</span>-->
                <!--<span>1867221****</span>-->
            <!--</li>-->
        </ul>
    </div>
</div>
<div class="pop">
    <div class="mask"></div>
    <div class="dialog" id="startDialog">
        <h3>确定开始抽奖？</h3>
        <a class="btn" id="startPopBtn">确定</a>
        <a class="close">X</a>
    </div>
    <div class="dialog" id="resetDialog">
        <h3>确定重置本次抽奖？</h3>
        <a class="btn" id="resetPopBtn">确定</a>
        <a class="close">X</a>
    </div>
    <div class="dialog" id="errorDialog">
        <h3>抽奖人数错了哦……</h3>
        <a class="btn" id="errorPopBtn">了解</a>
        <a class="close">X</a>
    </div>
</div>
<script type="text/javascript">
    var userData = <?php echo json_encode($userData);?>, luckyData = [];

    var $userList = $("#userList");
    var $userListUl = $userList.find("ul");
    var $luckyList = $("#luckyList");

    var $userNum = $("#userNum");
    var $luckyNum = $("#luckyNum");

    var $startBtn = $("#startBtn");
    var $resetBtn = $("#resetBtn");

    var $count = $("#count");

    var $pop = $(".pop");
    var $popMask = $pop.find(".mask");
    var $popClose = $pop.find(".close");

    var $startPopBtn = $("#startPopBtn");
    var $resetPopBtn = $("#resetPopBtn");
    var $errorPopBtn = $("#errorPopBtn");

    var scrollTimer;

    var init = function () {
        $userListUl.html("");
        for (var i in userData) {
            $userListUl.append("<li id='u_" + userData[i].code + "'>" + userData[i].code + "</li>")
        }

        $luckyList.html("");

        $userNum.html(userData.length);
        $luckyNum.html(0);
    }

    var scrollUserList =function() {
        var _crisisHeight = $userList.height() - $userListUl.height();
        var _scrollIt = function() {
            var _nowTop = parseInt($userListUl.css("marginTop"));
            if (_nowTop <= _crisisHeight) {
                $userListUl.css("marginTop", -2);
            } else {
                $userListUl.css("marginTop", _nowTop - 10);
            }
        }
        scrollTimer = setInterval(_scrollIt, 10);
    }

    var getLuckyList = function(num) {
        luckyData = [];
        $.ajax({
            url : "/frontend/default/lottery",
            dataType : 'json',
            data : {num:num},
            type : 'post',
            async: false,
			cache: false,
            success : function(o){
                if(o.code==200){
                    luckyData = o.data;
                }else{
                 alert(o.msg);   
                }
            },error: function(){alert('网络错误，请稍后重试');}
        })
    }

    var start = function(num) {
        var _status = $startBtn.attr("status");
        if (_status == 1) {
            getLuckyList(num);

            var _string = "";

            for (var i in luckyData) {
                _string += "<li><span>" + luckyData[i].code + "</span><span>" + luckyData[i].name + "</span><span>" + luckyData[i].phone + "</span></li>"
            }
            $luckyList.html(_string);
            $luckyNum.html(num);

            clearInterval(scrollTimer);
            $startBtn.html("<span>开始</span>").attr("status", 0);
        } else if(_status == 2) {
            $luckyList.html("");
            $luckyNum.html(0);

            scrollUserList();
            $startBtn.html("<span>抽奖</span>").attr("status", 1);

            hideDialog();
        } else {
            showDialog("startDialog");
        }
    }

    var reset = function() {
        $luckyList.html("");
        $luckyNum.html(0);

        clearInterval(scrollTimer);
        $startBtn.html("<span>开始</span>").attr("status", 0);

        hideDialog();
    }

    var showDialog = function(id) {
        $pop.show();
        $pop.find(".dialog").hide();

        if (id) {
            $("#" + id).show();
        } else {
            $pop.find(".dialog").eq(0).show();
        }
    }
    var hideDialog = function() {
        $pop.hide();
    }

    $(document).ready(function() {
        init();

        $startBtn.on("click", function() {
            var _num = $count.val();

            if (_num > 0 && _num <= 10) {
                start(_num);
            } else {
                showDialog("errorDialog");
            }

            return false
        })
        $resetBtn.on("click", function() {
            showDialog("resetDialog");

            return false
        })

        $startPopBtn.on("click", function() {
            var _num = $count.val();

            $startBtn.attr("status", 2);
            start(_num);

            return false
        })
        $resetPopBtn.on("click", function() {
            reset();

            return false
        })
        $errorPopBtn.on("click", hideDialog);

        $popMask.on("click", hideDialog);
        $popClose.on("click", hideDialog);
    })
</script>
</body>
</html>
