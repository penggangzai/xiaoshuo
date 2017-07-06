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
    <title>首页-阅文作家专区</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{url('images/detail.jpg')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/contentv2_index.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('/css/contentv2_base_3.css')}}" >
    <script type="text/javascript" src="{{asset('/js/contentv2_base_3.js')}}"></script>    <!-- prevent dom xss -->

    @section('link')
        <link  type="text/css" href="{{asset('css/bootstrap.css')}}">
        <!--弹框css-->
            <link href="{{asset('/alert/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <style>
        .clear::before, .clear::after{
            content: '';
            display: table;
        }

        .clear::after{
            clear: both;
        }
        .input{
            border:1px solid;
            width: 160px;
            height: 25px;
            margin-top:15px ;
        }
        .right{
            float: right;
        }
        .line{
            line-height:50px;
        }
    </style>
    @show
</head>
<body>
<div class="wrap">
    <div class="header">
        <div class="headBox pageCenter cf">
            <a href="/index.html">
                <img class="logo fl" src="{{asset('picture/logo_3.png')}}" width="225" height="28"  alt="爱阅读·作家专区" />
            </a>
            <div class="headUser fr">
                <ul class="cf">
                    <li id="msgBox" class="bell">
                        <a href="/authors/authorconsultlist.html">
                            <span class="icon">
                                <cite id='msgCount' class="icon" style="display:none;"></cite>
                            </span>
                            <a href="/authors/authorconsultlist.html">通知</a>
                        </a>
                        <dl id="msgList" class="msgBox" style="display:none;"></dl>
                    </li>
                    <li class="line"></li>
                    <li id="headPhotoBox" class="headPhoto">
                        <p>
                            <em>
                                @if(empty($_SESSION['author']['icon']))
                                    <img src="{{asset('picture/photo_default.png')}}" width="86" height="86">
                                @else
                                    <img src="{{asset($_SESSION['author']['icon'])}}" width="86" height="86">
                                @endif
                            </em>
                            <a class="userName" href="javascript:">{{$_SESSION['name']}}
                            </a>
                        </p>
                        <dl class="userBox">
                            <dd class="link">
                                <a href="{{url('home/author/info').'/'.$_SESSION['id']}}">作家资料</a>
                            </dd>
                            <dd class="link">
                                <a id="openModifyPwdPopupBtn" href="javascript:">更改密码</a>
                            </dd>
                            <dd class="link end">
                                <a href="{{asset('home/author/exit')}}">退出登录
                                </a>
                            </dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--更改VIP管理密码-->
    <div id="modifyPwdPopup" class="popupWrap w380" style="display:none;">
        <a data-node="closeBtn" class="icon closePopup" href="javascript:"></a>
        <h3>更改VIP管理密码</h3>
        <form action="{{asset('home/author/pwd')}}" method="post" name="regiForm">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$_SESSION['id']}}">
            <div class="popupBody p30">
                <div class="popupContent">
                    <p>原密码</p>
                    <p class="mb20">
                        <input  type="password" value="" name="ypwd" class="input">
                    </p>
                    <p>新密码</p>
                    <p class="mb20">
                        <input  type="password" value="" name="pwd" onblur="ckPass()" class="input">
                        <i class="f12 c999" id="ptab">6~16位英文、数字</i>
                    </p>

                    <p>再次输入新密码</p>
                    <p class="mb20">
                        <input  type="password" value="" name="repwd" onblur="rkPass()" class="input"><i id="rtab"></i>
                    </p>
                </div>
                <center class="confirmBtn">
                    <button style="width: 80px;height: 30px">提交</button>
                </center>
            </div>
        </form>
    </div>
    <div class="mainWrap pageCenter cf">
        <div id="leftNav" class="mainLeft fl" >
            <div class="sideBar" id="main-bar">
                <ul>
                    @section('index')
                    <li class="act">
                        <a href="{{url('home/author/index')}}"><span class="home"></span>专区首页</a>
                    </li>
                    @show
                    @section('work')
                    <li >
                        <a href="{{url('home/author/work').'/'.$_SESSION['id']}}">
                            <span class="works"></span>作品管理
                        </a>
                    </li>
                    @show
                    {{--<li >--}}
                        {{--<a href="/income/index.html"><span class="income"></span>稿酬收入</a>--}}
                    {{--</li>--}}
                        @section('good')
                    <li >
                        <a href="{{url('home/author/good').'/'.$_SESSION['id']}}"><span class="counsel"></span>我的物品</a>
                    </li>
                        @show

                    @section('integ')
                    <li >
                        <a href="{{url('home/author/integ').'/'.$_SESSION['id']}}"><span class="exchange"></span>积分兑换</a>
                    </li>
                        @show
                    {{--<li >--}}
                        {{--<a href="/interactivechapter/index.html"><span class="active"></span>互动管理</a>--}}
                    {{--</li>--}}
                </ul>
            </div>
        </div>
        <div class="mainRight pb260 fl">
                @section('info')
                <div class="authorInfoWrap cf">
                    <div class="headPhotoBox fl">
                        <span></span>
                        @if(empty($_SESSION['author']['icon']))
                        <img src="{{asset('picture/photo_default.png')}}" width="86" height="86">
                            @else
                            <img src="{{asset($_SESSION['author']['icon'])}}" width="86" height="86">
                            @endif
                    </div>
                    <div class="authorInfoBox fl">
                        <h3>{{$_SESSION['name']}}</h3>
                        <p>今天是{{date('Y年m月d日 , l')}}
                        </p>
                    </div>
                    <!-- 码字日历按钮 -->
                    <div class="btn-calendar">
                        <a href="javascript:;">
                            <i class="ico-calendar"></i>我的码字日历
                        </a>
                    </div>
                </div>
                @show
            <div class="midContentWrap">
                @section('contant')


                @show

            </div>
            <div id="pagerBox" class="pageBox fr"></div>
        </div>
        <script type="text/javascript" src="{{asset('js/contentv2_index.js')}}"></script><!-- start 弹窗 -->
        <!-- 码字日历begin -->
        <div class="popupWrap calendar-popup w580">
            <input type="hidden" id="isclick" value="1">
            <a class="icon close-popup J-close" href="javascript:"></a>
            <div class="popupBody calendar-cont">
                <h3 class="calendar-ttl">码字日历</h3>
                <!-- 更新字数统计 -->
                <div class="word-count">本月更新 <span class="num curnum">34567</span> 字</div>
                <!-- 模拟日历点击 -->
                <a class="choose-month prev-month J-prev-month" style="" href="javascript:;"></a>
                <a class="choose-month next-month J-next-month" href="javascript:;"></a>
                <!-- 模拟日历点击 -->
                <!-- 日历begin -->
                <div id="calendar">
                </div>
                <!-- 日历end -->
                <ul class="tip-bottom">
                    <li><i class="dot dot-blue"></i>当天有更新（不含作品相关和作品感言章节）</li>
                    <li><i class="dot dot-red"></i>当天未更新</li>
                </ul>
            </div>
        </div>
        <input type="hidden" id="year">
        <input type="hidden" id="month">
        <!-- 码字日历end -->
        <script type="text/javascript">
            $(function(){
                var imgUrl = "https://img1.write.qq.com/writer/p1",
                    is_new_editgroup_tip="0",
                    //newsid_default_open="",
                    isGuide = 0;
                CS.page.index.main.init(imgUrl, isGuide,is_new_editgroup_tip);
            });
        </script>
        <img id="requestLoadingTip" class="loadImg" style="display:none;" src="../../../../public/picture/loading.gif">
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
            <a target="_blank" href="http://bbs.write.qq.com">作家论坛
            </a><span>|</span>
            <a target="_blank" href="/about/help_center.html">帮助中心
            </a><span>|</span>
            <a id="contact" href="javascript:;">联系客服</a><span>|</span>
            <a target="_blank" href="http://join.book.qq.com/introduction.html">关于我们
            </a><span>|</span>
            <a target="_blank" href="http://join.book.qq.com/social.html">诚聘英才
            </a><span>|</span>
            <a target="_blank" href="/about/copyright.html">版权声明
            </a><span>|</span>Copyright
            © 2017 All Rights Reserved 阅文集团 版权所有
        </div>
    </div>



<script type="text/javascript" src="{{asset('js/contentv2_rightbar.js')}}">
{{--</script><!--end 意见反馈-->--}}
<script type="text/javascript">
    $(function(){
        //右侧工具条
        CS.rightBar.init();
    });
</script>

<script type="text/javascript" src="{{asset('js/contentv2_layout_2.js')}}">

</script>
<script type="text/javascript">
    $(function(){
        var systemTip = "";
        //模板页
        CS.page.layout.main.init(systemTip);

        //被其他站点以iframe方式嵌入后的处理
        CS.embed.init();
    });
</script>
<!-- 数据统计 -->
<script type="text/javascript">
    $(function(){

        var refreshKeyUrl = "https://passport.book.qq.com/index/refreshkey.html";

        function _refreshKey(){
            new Image().src = refreshKeyUrl;
        }

        setInterval(_refreshKey, 1800000); //30分钟
        $.getScript("https://tajs.qq.com/stats?sId=34321758");
        //new write
        $.getScript("https://tajs.qq.com/stats?sId=51056771");
    });
</script>
{{--密码验证--}}
<script>
    function ckPass(){
        var poss = document.regiForm.pwd.value;
        var ptab = document.getElementById('ptab');
        if (poss.match(/^[a-zA-Z]\w{5,17}$/) == null) {
            ptab.innerHTML = '* 密码长度不合法!';
            ptab.style.color = '#FF0000';
        } else{
            ptab.innerHTML = '* 验证通过!';
            ptab.style.color = '#00FF40';
        }
    }

    function rkPass(){
        var poss = document.regiForm.pwd.value;
        var rposs = document.regiForm.repwd.value;

        var ptab = document.getElementById('ptab');
        if (poss != rposs) {
            rtab.innerHTML = '* 俩次密码输入不一致!';
            rtab.style.color = '#FF0000';
        } else{
            rtab.innerHTML = '* 验证通过!';
            rtab.style.color = '#00FF40';
        }
    }
</script>
    <!-- Sweet alert -->
    <script src="{{url('/alert/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <!--提示弹框-->
    @if(!empty(session('error')))
        <script>
            alert('{{session('error')}}')
        </script>
    @endif

</body>
</html>