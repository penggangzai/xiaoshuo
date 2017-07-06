<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>爱阅读中文网站</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{url('images/detail.jpg')}}">
    {{--弹框--}}
    <link href="{{url('/alert/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <link href="{{url('/home/with/css/catalog.css')}}" rel="stylesheet"/>
    <script src="{{url('/home/with/js/jquery.min.js')}}"></script>
    <script src="{{url('/home/with/js/util.js')}}"></script>
</head>
<body>
<div id="ccon_load">
    <div id="cntaddiv_1"></div>
</div>
<div id="con_contain" style="width:960px; margin:0 auto; min-height:500px;">
    <div id="catalogbox">
        <div id="catalog_title">
            <div id="detail_title">
                <h1>{{$list->title}}</h1>
                <span></span><span>作者：{{$name->wirter}}</span><span>书名：{{$name->bookname}}</span>
                <span>更新时间：{{$list->uptime}}</span><span></span>
            </div>
        </div>
        <div id="detail_list">
            <div id="zjcontentdiv">

                <?php echo $list->contant?>
                
            </div>

            <div id="cntaddiv_2"></div>
            <div id="detailsubsbox">
                <span><a href="{{url('home/withindex')}}/{{$id}}/{{$tid-1}}" name="przjurl" title="阅读上一章节"><img
                                src="{{url('/home/with/picture/detail_btn_pre.gif')}}" alt="阅读上一章节"/></a></span>
                <span><a href="{{url('home/listchapter')}}/{{$id}}" title="返回本书目录页"><img
                                src="{{url('/home/with/picture/detail_btn_backcatalog.gif')}}" alt="返回本书目录页"></a></span>
                <span><a href="{{url('home/withindex')}}/{{$id}}/{{$tid+1}}" name="nextzjurl" title="阅读下一章节"><img
                                src="{{url('/home/with/picture/detail_btn_next.gif')}}" alt="阅读下一章节"/></a></span>
            </div>
        </div>
        <script src="{{url('/home/with/js/chapterreader.js')}}"></script>
    <!-- Sweet alert -->
        <script src="{{url('/alert/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
        <!--提示弹框-->
 @if(!empty(session('error')))
<script>
    (function () {
        swal({
            title: "{{session('error')}}",
            text: "点击确定跳转到登入页面！",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "确定",
            closeOnConfirm: false
        }, function () {
            {{--跳转到登入页--}}
                window.location.href = "{{session('url')}}";
        });
    })();
</script>
@endif
</body>
</html>
