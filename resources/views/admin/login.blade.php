<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>欢迎您登录爱阅读后台管理系统</title>
<link rel="shortcut icon" type="image/x-icon" href="{{url('images/detail.jpg')}}">
<link href="{{ url('/admin/logon/css/login.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<div class="login-layout">
    <div class="top">
        <h2>欢迎您登录爱阅读后台管理系统</h2>
    </div>
    <form action="{{url('/admin/login')}}" method="post" id="form_login">
        {{  csrf_field() }}
        <div class="lock-holder">
            <div class="form-group pull-left input-username">
                <label>账号</label>
                <input name="user" id="username" type="text" class="input-text" value="" autocomplete="off" >
            </div>
            <div class="form-group pull-right input-password-box">
                <label>密码</label>
                <input name="pwd" id="password" class="input-text" autocomplete="off" type="password" autocomplete="off">
            </div>
        </div>
        <div class="avatar"><img src="{{ url('/admin/logon/images/login/admin.png')}}" alt=""></div>
        <div class="submit"> <span>
            <div class="code">
              <div class="arrow"></div>
              <div id="v_container" class="verifycode" style="width: 130px;margin-top:10px;"></div>
              <a href="JavaScript:void(0);" id="hide" class="close" title="关闭"><i></i></a>
            </div>
            <input name="captcha" type="text" required class="input-code"  id="code_input" placeholder="输入验证" title="验证码为4个字符" value="" >
            </span>
            <span><input id="my_button" name="" class="input-button btn-submit" type="button" value="登录"></span>
        </div>
        <div class="submit2"></div>
    </form>
</div>
<!--[if lt IE 9]>
<script type="text/javascript" src="__STATIC__/js/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="{{asset('js/jquery-2.0.3.min.js')}}"></script>
<script type="text/javascript" src="__STATIC__/js/app.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<!--<![endif]-->
<script type="text/javascript" src="{{asset('admin/logon/js/common.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/logon/js/jquery.progressBar.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/logon/js/canvas-particle.js')}}"></script>
<script type="text/javascript" src="{{asset('js/gVerify.js')}}"></script>
<script type="text/javascript">
var verifyCode = new GVerify("v_container");

document.getElementById("my_button").onclick = function(){
    var res = verifyCode.validate(document.getElementById("code_input").value);
    if(res){
        $("#captcha").nc_placeholder();//placeholder兼容
        //动画登录
        $('.btn-submit').click(function(e){
            $('.input-username,dot-left').addClass('animated fadeOutRight')
            $('.input-password-box,dot-right').addClass('animated fadeOutLeft')
            $('.btn-submit').addClass('animated fadeOutUp')
            setTimeout(function () {
                    $('.avatar').addClass('avatar-top');
                    $('.submit').hide();
                    $('.submit2').html('<div class="progress"><div class="progress-bar progress-bar-success" aria-valuetransitiongoal="100"></div></div>');
                    $('.progress .progress-bar').progressbar({
                        done : function() {$('#form_login').submit();}
                    });
                },
                300);
        });
    }else{
        return alert("验证失败");
    }
}

$(function(){
    //显示隐藏验证码
    $("#hide").click(function(){
        $(".code").fadeOut("slow");
    });
    $("#code_input").focus(function(){
        $(".code").fadeIn("fast");
    });

    $("#captcha").nc_placeholder();//placeholder兼容

    //背景特效
    var config = {vx: 4, vy:  4, height: 2, width: 2, count: 100, color: "121, 162, 185", stroke: "100,200,180", dist: 6000, e_dist: 20000, max_conn: 10 }
    CanvasParticle(config);
});
</script>
@if(!empty(session('error')))
    <script>
        alert('{{session('error')}}');
    </script>
@endif
</body>
</html>
