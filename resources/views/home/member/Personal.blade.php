<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>爱阅读中文网站</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{url('images/detail.jpg')}}">
	@section('link')

	    <link rel="stylesheet" href="{{ url('/css/Personal.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
		<script src="{{ url('/js/jquery.min.js') }}"></script>
		<script src="{{ url('/js/bootstrap.min.js') }}"></script>
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
					{{--<li><a href="">消息中心</a></li>--}}
					<li><a href="{{url('member/out')}}">退出</a></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 subleft">
					<ul class="submit1 mouse">
						<li><a href="{{url('member/index')}}">我的首页</a></li>
						<li><a href="{{url('Secret/Secret')}}">绑定密保</a></li>
						<li><a >账务中心</a></li>
						<li><a >我的票夹</a></li>
						<li><a >我的红包</a></li>
						<li><a >我的书评</a></li>
						<li><a >魔兽世界</a></li>
						<li><a >守望先锋</a></li>
					</ul>

				</div>
			<div class="col-md-1"></div>
			<div class="col-md-9">
				<div class="subright">
					@section('contant')
						<div class="srtop">
							<div class="paragraph1">
								<div class="circular">
									@if(empty($list->icon))
									<img src="{{asset('images/4.jpg')}}" width="100" height="100"/>
									@else
										<img  src="{{$list->icon}}"  width="100" height="100"/>
									@endif
								</div>
							</div>
							<div class="paragraph2">
								<div class="title">
									<h3>书友名字:</h3>
									<h3>@if(empty($list->username)) {{$_SESSION['home']['phone']}} @else {{$list->username}} @endif </h3>
								</div>
								<div class="homepage">
									<b><a href="{{url('member/edit')}}">修改资料</a></b>
								</div>

							</div>
							<div class="paragraph3">
								<h3>关注<hr><b>100</b></h3>
								<h3>粉丝<hr><b>100</b></h3>
							</div>
						</div>
						<div class="srbottom">
							<div class="srbottomtop">
								<h3><b>猜你喜欢</b></h3>
							</div>

							<div class="srbottombottom">
								@foreach($data as $v)
								<div class="like">
									<div class="photograph">
										<a href="{{url('home/deta').'/'.$v->bid}}">
											<img src="{{ asset($v->url) }}" width="120" height="130">
										</a>
									</div>
									<div>
										<a href="{{url('home/deta').'/'.$v->bid}}">

											<h4><b>{{$v->wirter}}</b></h4><br>
										</a>
									</div>
								</div>
								@endforeach
							</div>
						</div>
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
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<h6>本站所收录作品、社区话题、书库评论及本站所做之广告均属其个人行为，与本站立场无关</h6>
				</div>
				<div class="col-md-3"></div>
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

	@if(!empty(session('error')))
		<script>
            alert('{{session('error')}}')
		</script>
	@endif
</body>
</html>