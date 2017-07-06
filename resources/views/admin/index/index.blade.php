<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>爱阅读后台管理系统</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{url('images/detail.jpg')}}">
    {{--引入头部css--}}
    <link href="{{url('/admin/class/css/css.css')}}" type="text/css" rel="stylesheet"/>
    <link href="{{asset('/admin/public/css/bootstrap.min.css')}}" rel="stylesheet">
    @section('ind')
    <!--弹框css-->
        <link href="{{url('/alert/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
    @show
    <link rel="stylesheet" href="{{url('admin/class/css/my.css')}}">
    <!-- 引入 jQuery -->
    <script src="{{url('/js/app.js')}}"></script>
    <script src="{{url('/admin/class/jq/scripts/easing.js')}}"></script>
</head>
<body onselectstart="return false" oncontextmenu=return(false) style="overflow-x:hidden;">
<div class="top">
    <div class="top-top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" id="header">
            <tr>
                <td rowspan="2" align="left" valign="top" id="logo"><img
                            src="{{url('/admin/class/images/main/logo.jpg')}}" width="74"
                            height="64"></td>
                <td align="left" valign="bottom">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="left" valign="bottom" id="header-name">爱阅读</td>
                            <td align="right" valign="top" id="header-right">
                                <a href="{{asset('admin/out')}}" onFocus="this.blur()"
                                   class="admin-out">注销 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                <a href="{{asset('/')}}" target="_blank" onFocus="this.blur()"
                                   class="admin-index">网站首页</a>
                                <span>
<!-- 日历 -->
<SCRIPT type=text/javascript src="{{url('/admin/class/js/clock.js')}}"></SCRIPT>
<SCRIPT type=text/javascript>showcal();</SCRIPT>
            </span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="left" valign="bottom">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="left" valign="top" id="header-admin">后台管理系统</td>
                            <td align="right" valign="top" id="header-right">
                                欢迎 @if(empty($_SESSION['admin']['name'])){{$_SESSION['admin']['user']}} @else
                                    {{$_SESSION['admin']['name']}} @endif登陆&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="content">
    <div class="content-c clearfix">
        <div class='left'>
            <div class="treebox">
                <ul class="menu">
                    <li class="level1">
                        <a href="#none"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;分类管理<i class="down"></i></a>
                        <ul class="level2">
                            <li><a href="{{url('admin/clist')}}">分类列表</a></li>
                            <li><a href="{{url('admin/cateindex')}}">新增一级分类</a></li>
                        </ul>
                    </li>
                    <li class="level1">
                        <a href="#none"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;书籍管理<i></i></a>
                        <ul class="level2">
                            <li><a href="{{url('admin/booklist')}}">书籍列表</a></li>
                            <li><a href="{{url('admin/book')}}">添加书籍</a></li>
                        </ul>
                    </li>
                    <li class="level1">
                        <a href="#none"><span class="glyphicon glyphicon-education" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;章节管理<i></i></a>
                        <ul class="level2">
                            <li><a href="{{url('admin/section')}}">添加章节</a></li>
                        </ul>
                    </li>
                    <li class="level1">
                        <a href="#none"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;用户管理<i></i></a>
                        <ul class="level2">
                            <li><a href="{{url('admin/user')}}">用户列表</a></li>
                            <li><a href="{{url('admin/useradd')}}">用户添加</a></li>
                        </ul>
                    </li>
                    <li class="level1">
                        <a href="#none"><span class="glyphicon glyphicon-userglyphicon glyphicon-picture" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;轮播图<i></i></a>
                        <ul class="level2">
                            <li><a href="{{url('admin/banlist')}}">轮播图列表</a></li>
                            <li><a href="{{url('admin/adin')}}">添加轮播图</a></li>
                        </ul>
                    </li>
                    <li class="level1">
                        <a href="#none"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;精品推荐<i></i></a>
                        <ul class="level2">
                            <li><a href="{{url('admin/groomlist')}}">精品推荐列表</a></li>
                            <li><a href="{{url('admin/grin')}}">添加推荐</a></li>
                        </ul>
                    </li>
                    <li class="level1">
                        <a href="#none"><span class="glyphicon glyphicon-music" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;音乐管理<i></i></a>
                        <ul class="level2">
                            <li><a href="{{url('admin/mp')}}">查看列表</a></li>
                        </ul>
                    </li>
                    <li class="level1">
                        <a href="#none"><span class="glyphicon glyphicon-volume-up" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;公告管理<i></i></a>
                        <ul class="level2">
                            <li><a href="{{url('admin/not')}}">查看列表</a></li>
                        </ul>
                    </li>
                    <li class="level1">
                        <a href="#none"><span class="glyphicon glyphicon-volume-up" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;反馈管理<i></i></a>
                        <ul class="level2">
                            <li><a href="{{url('admin/findex')}}">反馈列表</a></li>
                        </ul>
                    </li>
                    <li class="level1">

                        <a href="#none"><span class="glyphicon glyphicon-compressed" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;广告管理<i></i></a>
                        <ul class="level2">
                            <li><a href="{{url('poster/poster')}}">广告列表</a></li>
                        </ul>
                    </li>
                    <li class="level1">
                        <a href="#none"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;评论管理<i></i></a>
                        <ul class="level2">
                            <li><a href="{{url('comment/comment')}}">评论列表</a></li>
                            <li><a href="{{url('comment/commentt')}}">追加评论列表</a></li>
                        </ul>
                    </li>
                    <li class="level1">
                        <a href="#none"><span class="glyphicon glyphicon-sort-by-order-alt" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;评分管理<i></i></a>
                        <ul class="level2">
                            <li><a href="{{url('Grade/Grade')}}">评分列表</a></li>
                        </ul>
                    </li>
                    <li class="level1">
                        <a href="#none"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;作者管理<i></i></a>
                        <ul class="level2">
                            <li><a href="{{asset('/admin/author/index')}}">作者列表</a></li>
                            <li><a href="{{asset('/admin/author/add')}}">添加用户</a></li>
                        </ul>
                    </li>
                    <li class="level1">
                        <a href="#none"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;积分奖品<i></i></a>
                        <ul class="level2">
                            <li><a href="{{url('admin/prize/index')}}">奖品列表</a></li>
                            <li><a href="{{url('admin/prize/add')}}">添加添加</a></li>
                        </ul>
                    </li>
                    <li class="level1">
                        <a><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;后台用户<i></i></a>
                        <ul class="level2">
                            <li><a href="{{url('/admin/auser/index')}}">用户列表</a></li>
                            <li><a href="{{url('/admin/auser/add')}}">添&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;加</a></li>

                        </ul>
                    </li>
                    <li class="level1">
                        <a href="#none"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;职位管理<i></i></a>
                        <ul class="level2">
                            <li><a href="{{url('/admin/role/index')}}">职位列表</a></li>
                            <li><a href="{{url('/admin/role/add')}}">职位添加</a></li>
                        </ul>
                    </li>
                    <li class="level1">
                        <a href="#none"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;权限管理<i></i></a>
                        <ul class="level2">
                            <li><a href="{{url('/admin/control/index')}}">权限列表</a></li>
                            <li><a href="{{url('/admin/control/add')}}">权限添加</a></li>

                        </ul>
                    </li>
                    <li class="level1">
                        <a href="#none"><span class="glyphicon glyphicon-text-color" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;链接管理<i></i></a>
                        <ul class="level2">
                            <li><a href="{{url('exchange/exchange')}}">友情链接列表</a></li>
                            <li><a href="{{url('exchange/exchangeadd')}}">添加链接列表</a></li>
                        </ul>
                    </li>
                    <li class="level1">
                        <a href="#none"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;游戏管理<i></i></a>
                        <ul class="level2">
                            <li><a href="{{url('gamelink/gamelink')}}">游戏链接列表</a></li>
                            <li><a href="{{url('gamelink/gamelinkadd')}}">游戏链接添加</a></li>
                        </ul>
                    </li>
                    <li class="level1">
                        <a href="#none"><span class="glyphicon glyphicon-superscript" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;日月周榜<i></i></a>
                        <ul class="level2">
                            <li><a href="{{url('poster/poster')}}">日月周榜列表</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="right">
            @section('link')
            @show
        </div>
    </div>
</div>

{{--手风琴菜单--}}
<script>
    //等待dom元素加载完毕.
    $(function () {
        $(".treebox .level1>a").click(function () {
            $(this).addClass('current')   //给当前元素添加"current"样式
                .find('i').addClass('down')   //小箭头向下样式
                .parent().next().slideDown('slow', 'easeOutQuad')  //下一个元素显示
                .parent().siblings().children('a').removeClass('current')//父元素的兄弟元素的子元素去除"current"样式
                .find('i').removeClass('down').parent().next().slideUp('slow', 'easeOutQuad');//隐藏
            return false; //阻止默认时间
        });
    })
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