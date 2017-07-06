<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- 360安全游览器使用webkit极速核 -->
    <meta name="renderer" content="webkit"/>
    <!-- IE使用它支持的最高模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="小说阅读,精彩小说尽在创世小说.创世小说提供玄幻小说,武侠小说,原创小说,网游小说,都市小说,言情小说,职场小说,历史小说,军事小说,网游小说,科幻小说,恐怖小说,首发小说最新章节免费小说阅读小说下载txt,精彩尽在创世小说!2013年热门小说:无敌唤灵,无红色权力,无限曙光,余罪,兵临天下,盛唐风月,武帝,大官人,勇闯天涯,机甲天王"/>
    <meta name="keywords" content="小说,小说网,言情小说,职场小说,玄幻小说,武侠小说,都市小说,历史小说,网络小说,小说下载,小说txt,小说全文阅读,原创网络文学"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://img1.write.qq.com/writer/p1/contentv2/aa_ico.ico"/>
    @section('link')
        <title>帐号登录-阅文作家专区</title>
    @show
    <link href="{{asset('css/application-5299c0f75631c9078e3e302425a6da14.css')}}" media="screen" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/contentv2_base.css')}}">
    <script  src="{{asset('js/contentv2_base.js')}}"></script>
    <meta name="__hash__" content="6a55f9b92d0eaf671b62fc3a7ac18d6f_1a496f02b810598fbd002888a97e8639">
    <link rel="stylesheet"  href="{{asset('css/contentv2_login.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

</head>

<body>
<div class="wrap login">
    <div class="header">
        <div class="headBox pageCenter cf">
            <a href="//write.qq.com">
                <img class="logo fl" src="{{asset('picture/logo.png')}}" width="225" height="28" alt="阅文·作家专区"/>
            </a>
        </div>
    </div>
    <div class="loginWrap pageCenter">
        <img src="{{asset('picture/slogan.jpg')}}" alt=""/>
        <div class="login-box" >
            @section('contant')
                <table class="table">
                    <tr>
                        <td class="hight" >账号登录</td>
                        <td ></td>
                        <td ></td>
                    </tr>
                </table>
                <ul>
                    <li>
                        <form action="{{url('home/author/checklogin')}}" method="post" name="regiForm">
                            {{  csrf_field() }}
                            <input type="hidden" name="logintime" value="{{time()}}">
                            <input type="hidden" name="loginip" value="{{$_SERVER['REMOTE_ADDR']}}">
                            <div class="form-group mt">
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="电话" maxlength="11" name="phone" onblur="ckUser()">
                                <span id="utab"></span>
                            </div>
                            <div class="form-group mt">
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="密码" name="pwd">
                            </div>
                            <div class="mt clearfix">
                                <p class="float">
                                    <a data-toggle="modal" data-target="#myModal">忘记密码</a> <span>|</span>
                                    <a href="{{url('home/author/rig')}}">注册账号</a>
                                </p>
                            </div>
                            <div class="clearfix">
                                <button  class="btn btn-lg btn-default mt float ">
                                    登录
                                </button>
                            </div>

                        </form>

                    </li>
                </ul>
            @show
        </div>
    </div>
    <div class="footer">
        <div class="pageCenter">
            <div id="contact-bubble" class="footer-bubble">
                <em><i></i></em>
                <ul>
                    <li><a target="_blank" href="http://kf.qidian.com/Default.aspx">联系起点客服</a></li>
                    <li><a target="_blank" href="http://kf.qq.com/product/chuangshi.html">联系创世客服</a></li>
                </ul>
            </div>
            <a target="_blank"
               href="http://bbs.write.qq.com">作家论坛</a><span>|</span>
            <a target="_blank"
               href="/about/help_center.html">帮助中心</a><span>|</span>
            <a id="contact" href="javascript:;">联系客服</a><span>|</span><a
                    target="_blank" href="http://join.book.qq.com/introduction.html">关于我们</a><span>|</span><a
                    target="_blank" href="http://join.book.qq.com/social.html">诚聘英才</a><span>|</span><a
                    target="_blank" href="/about/copyright.html">版权声明</a><span>|</span>Copyright
            © 2017 All Rights Reserved 阅文集团 版权所有
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{--<h4 class="modal-title" id="myModalLabel">Modal title</h4>--}}
            </div>
            <div class="modal-body">
                <div class='ui grid page center aligned'>
                    <div class='row git-reset-password-row'>
                        <div class='six wide column git-reset-password-board'>
                            <form  action="{{url('home/author/email')}}" class="left aligned ui form flat segment " id="new_user" method="post">
                                {{csrf_field()}}
                                <header class='git-reset-password-header'>
                                    <div class='git-reset-password-title'>
                                        <div class='mayun-icon my-ic_reset_password my-ic_reset_password-dims' style='display: inline-block;'>
                                        </div>
                                        <span>发送重置密码邮件</span>
                                    </div>
                                    <span class='float-right register'>
        <a href="/login">返回登录</a>
        </span>
                                </header>
                                <div class='git-reset-password-form-fields'>
                                    <div class='field'>
                                        <input class="text" id="user_email" name="email" placeholder="Email" required="required" size="30" type="email" value=""/>
                                    </div>
                                    <div class='two fields relative'>
                                        <div class='field captcha-input-field'>
                                            <input id="captcha" name="phone" placeholder="电话"  type="text" value="" style="width: 298px"/>
                                        </div>
                                    </div>
                                    <br>
                                    <input class="ui fluid orange submit button disbtn large" name="commit" type="submit" value="提 交"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
@section('script')
<script>
    function ckUser(){
        var user = document.regiForm.phone.value;
        var utab = document.getElementById('utab');
        if (user.match(/^1(3|4|5|7|8)\d{9}$/) == null) {
            utab.innerHTML = '* 手机号格式不正确....';
            utab.style.color = '#FF0000';
            return false;
        } else{
            utab.innerHTML = '* 验证通过!';
            utab.style.color = '#00FF40';
            return true;
        }
    }
</script>
@show
@if(!empty(session('error')))
    <script>
        alert('{{session('error')}}')
    </script>
@endif
</body>
</html>
