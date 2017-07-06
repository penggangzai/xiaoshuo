<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>爱阅读中文网站</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{url('images/detail.jpg')}}">
	@section('link')
	    <link rel="stylesheet" href="{{ url('/css/Personal.css') }}">
		<link href="http://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
		<script src="http://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<!--弹框css-->
		<link href="{{url('/alert/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
	@show
</head>
<body>
	<div class="container">
		<div class="row head">
			<div class="col-md-2 clearfix" >
					<h2><img src="{{ url('/images/detail.jpg')}}" width="50" height="50"><b>&nbsp;个人中心</b></h2>
			</div>
			<div class="col-md-1" >
			</div>
			<div class="col-md-9">
				<ul  id="nva" >
					<li><a href="{{url('/')}}">首页</a></li>
					<li><a href="{{url('member/collection')}}">我的书架</a></li>
					<li><a href="">消息中心</a></li>
					<li><a href="{{url('member/out')}}">退出</a></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 subleft">
					<ul class="submit1 mouse">
						<li><a href="{{url('member/index')}}">我的首页</a></li>
						<li><a href="{{url('Secret/Secret')}}">绑定密保</a></li>
						<li><a href="{{url('Secret/Secret')}}">星座运势</a></li>
						<li><a>账务中心</a></li>
						<li><a>我的票夹</a></li>
						<li><a>我的红包</a></li>
						<li><a>我的书评</a></li>
						<li><a>魔兽世界</a></li>
						<li><a>守望先锋</a></li>
					</ul>
					</ul>

					<div>
						<a href="">
							{{--<img src="{{ url('/images/10.jpg') }}" width="180">--}}
						</a>
					</div>
				</div>
			<div class="col-md-1"></div>
			<div class="col-md-9">
				<div class="subright">
					@section('contant')

					@show
				</div>
			</div>
		</div>
	</div>

		<div class="clearfix"></div>
		<div class="rear">
			<h5 class="yan">
				<a href="">&nbsp;关于起点</a>
				<a href="">&nbsp;联系我们</a>
				<a href="">&nbsp;加入我们</a>
				<a href="">&nbsp;帮助中心</a>
				<a href="">&nbsp;提交建议</a>
				<a href="">&nbsp;起点论坛</a>
			</h5>
			<div class="clearfix"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-7">
						<h6>Copyright (C) 2002-2017 www.qidian.com All Rights Reserved 版权所有</h6>
					</div>
					<div class="col-md-3"></div>
				</div>
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-11">
						<h6>上海玄霆娱乐信息科技有限公司 上海玄霆娱乐信息科技有限公司 增值电信业务经营许可证沪B2-20080046 沪网文[2015]0081-031 新出网证(沪)字010 沪ICP备08017520号-1</h6>
					</div>
					{{--<div class="col-md-3"></div>--}}
				</div>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-7">
						<h6>请所有作者发布作品时务必遵守国家互联网信息管理办法规定，我们拒绝任何色情小说，一经发现，即作删除！</h6>
					</div>
					<div class="col-md-3"></div>
				</div>
			</div>
		</div>
	</div>
	@section('script')

	<script>
        $('.srtop').css('background','url({{asset('images/shuji.png')}})')

        $('#nva li').mousemove(function () {
			$(this).css('background','#ee4259');
        });
		$('#nva li').mouseout(function () {
			$(this).css('background','#163979');
		});
        $('.mouse li').mousemove(function () {
            $(this).css('background','#ee4259');
        });
        $('.mouse li').mouseout(function () {
            $(this).css('background','#F7F6F2');
        });
	</script>
	@show

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