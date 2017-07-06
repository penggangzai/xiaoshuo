
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{url('images/detail.jpg')}}">
    <title>爱阅读中文网站</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    @section('link')
    @show
    {{--弹框--}}
    <link href="{{url('/alert/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('admin/class/css/my.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/index/css/yc_1.css')}}">
    <script src="{{url('/js/app.js')}}"></script>
    <link rel="stylesheet" href="{{url('home/index/css/myindex.css')}}">
    <script type="text/javascript" src="{{asset('home/index/js/libs_1.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/index/js/json3_1.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/index/js/message_1.js')}}"></script>
    <style>
        #div1{
            width:130px;
            height:200px;
            /*border:2px red solid;*/
            position: fixed;
            left:5px;
            top:150px;
            z-index:1000;
        }
        #div2{
            width:130px;
            height:200px;
            /*border:2px red solid;*/
            position: fixed;
            right:5px;
            top:150px;
            z-index:1000;
        }
    </style>
</head>
<script type="text/javascript" src="https://api.seniverse.com/v3/weather/now.json?location=beijing&ts=1443079775&ttl=30&uid=[your_uid]&sig=[your_signature]&callback=showWeather"></script>
<script>(function(T,h,i,n,k,P,a,g,e){g=function(){P=h.createElement(i);a=h.getElementsByTagName(i)[0];P.src=k;P.charset="utf-8";P.async=1;a.parentNode.insertBefore(P,a)};T["ThinkPageWeatherWidgetObject"]=n;T[n]||(T[n]=function(){(T[n].q=T[n].q||[]).push(arguments)});T[n].l=+new Date();if(T.attachEvent){T.attachEvent("onload",g)}else{T.addEventListener("load",g,false)}}(window,document,"script","tpwidget","//widget.seniverse.com/widget/chameleon.js"))</script>
<script>tpwidget("init", {
        "flavor": "bubble",
        "location": "WX4FBXXFKE4F",
        "geolocation": "enabled",
        "position": "top-right",
        "margin": "10px 10px",
        "language": "zh-chs",
        "unit": "c",
        "theme": "chameleon",
        "uid": "UC560C1A9E",
        "hash": "8aa3a1b9d29d21f637d91a1c75439da6"
    });
    tpwidget("show");</script>
<body id="page-163-com" class="m-yc g-gf">
<noscript>
    请使用支持脚本的浏览器！
</noscript>
@section('not')

@show

<div class="g-doc">
    <!-- 头部导航 -->
    <div class="g-hdw">
        <div class="m-headerbottom">
            @section('MP3')

            @show
            <div class="inner">
                <ul class="m-mianlist">
                    <li><a class="crt" href="{{url('/')}}">首页</a></li>
                    <li><a class="" href="{{url('home/blist')}}/q">全部作品</a></li>
                    @foreach ($list as $v)
                        <li><a class="" href="{{url('home/blist')}}/{{$v->id}}/{{$v->pid}}">{{$v->name}}</a></li>
                    @endforeach

                    @if(empty($_SESSION['home']))
                    <li class="fr">
                        <a href="{{url('home/entryy')}}">登录</a>
                    </li>
                    <li class="fr">
                        <a href="{{url('home/entry')}}">注册</a>
                    </li>
                    @else
                        <li class="fr">
                            <a href="{{url('member/out')}}">退出</a>
                        </li>
                        <li class="fr">
                            <a href="{{url('member/index')}}">
                                {{$_SESSION['home']['phone']}}
                            </a>
                        </li>
                    @endif
                    <li class="fr">
                        <a  data-toggle="modal" data-target="#myModal">站点反馈</a>
                    </li>
                    <li class="fr">
                        @if(empty($_SESSION['name']))

                        <a href="{{url('home/author/login')}}" target="_blank"
                          >
                            <b class="icon-open"></b>作者中心
                        </a>
                            @else
                            <a href="{{url('home/author/index')}}" target="_blank">
                                <b class="icon-open"></b>{{$_SESSION['name']}}
                            </a>
                            @endif
                    </li>
                    <li class="fr">
                        <a href="{{url('recreation/recreation')}}" target="_blank"
                           >
                            <b class="icon-download"></b>游戏专区
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-headerson">
            <div class="inner">
                <ul class="f-cb">
                    <li><a href="{{url('home/blist')}}/q">全部</a></li>
                    <li><span class="sep">|</span></li>
                    @foreach($list_s as $v)
                        <li><a href="{{url('home/blist')}}/{{$v->id}}">{{$v->name}}</a></li>
                        <li><span class="sep">|</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- 主题内容 -->
@section('contant')
@show
<!-- 尾部导航 -->
<div class="g-ftw">
    <div class="g-ft" class="f-cb">
        <div class="m-foot">
            <p class="link">
                <a href="{{url('/')}}" >首页</a><span class="sep">|</span>
                <a>公司简介</a><span
                        class="sep">|</span>
                <a >客户服务</a><span class="sep">|</span>
                <a>相关法律</a><span class="sep">|</span>
                <a >网站导航</a><span class="sep">|</span>
                <a id="J_Service" href="javascript:void(0);">客服电话</a><span class="sep">|</span>
                <a >帮助中心</a><span class="sep">|</span>
                <a href="{{url('home/author/index')}}" target="_blank">作者中心</a>
            </p>
        </div>
        <div class="m-right">
            <p>
                爱阅读版权所有&#169;1997-<span id="j-year">2017</span>
            </p>
        </div>
    </div>
</div>
</div>
<!-- 共用结构 -->
<!-- 右侧悬浮 -->
<div id="J_rightsidebar">
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <table >
                    <tr>
                        <td>您的位置 :&nbsp;&nbsp;>&nbsp;&nbsp;站点反馈 &nbsp; [登入之后才能反馈] &nbsp; <a href="{{url('home/entryy')}}">立即登入</a> </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top">
                            <form method="post" action="{{url('admin/fadd')}}" enctype='multipart/form-data'>
                                {{  csrf_field() }}
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">

                                    <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                        onMouseOver="this.style.backgroundColor='#edf5ff'">
                                        <td align="right" valign="middle" class="borderright borderbottom bggray">反馈主题：
                                        </td>
                                        <td align="left" valign="middle" class="borderright borderbottom main-for">
                                            <input type="text" name="title" value="" class="text-word">
                                        </td>
                                    </tr>


                                    <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                        onMouseOver="this.style.backgroundColor='#edf5ff'">
                                        <td align="right" valign="middle" class="borderright borderbottom bggray">反馈内容:
                                        </td>
                                        <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <textarea name="text"style="width: 315px;height: 200px;border: 1px solid #ccc;"
                                          class="text-word"></textarea>
                                        </td>
                                    </tr>

                                    </tr>
                                    <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                        onMouseOver="this.style.backgroundColor='#edf5ff'">
                                        <td align="right" valign="middle" class="borderright borderbottom bggray">
                                            &nbsp;</td>
                                        <td align="left" valign="middle" class="borderright borderbottom main-for">
                                            <input name="" type="submit" value="提交" class="text-but">
                                            <input name="" type="reset" value="重置" class="text-but"></td>
                                    </tr>
                                </table>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- 为了适配urs web组件 登陆框提前渲染-->
{{--<script src="{{asset('home/index/js/urslogin_1.js')}}"></script>--}}
<script src="{{asset('home/index/js/components_1.js')}}"></script>
<script src="{{asset('home/index/js/man.bundle_1.js')}}"></script>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-25074971-1'], ['_setLocalGifPath', '/UA-25074971-1/__utm.gif'], ['_setLocalRemoteServerMode']);
    _gaq.push(['_addOrganic', 'baidu', 'word']);
    _gaq.push(['_addOrganic', 'soso', 'w']);
    _gaq.push(['_addOrganic', 'youdao', 'q']);
    _gaq.push(['_addOrganic', 'sogou', 'query']);
    _gaq.push(['_addOrganic', 'so.360.cn', 'q']);
    _gaq.push(['_trackPageview']);
    _gaq.push(['_trackPageLoadTime']);
    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = 'https://wr.da.netease.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>

<!-- Sweet alert -->
<script src="{{url('/alert/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
<!--提示弹框-->
@if(!empty(session('error')))
    <script>
        (function () {
            swal({
                title: "{{session('error')}}",
                type: "{{session('success')}}",
            });
        })();
    </script>
@endif

</body>
</html>