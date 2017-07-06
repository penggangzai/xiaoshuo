<!doctype html>
<head>
<title>爱阅读中文网站</title>
<link rel="shortcut icon" type="image/x-icon" href="{{url('images/detail.jpg')}}">
{{--弹框--}}
<link href="{{url('/alert/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
<link href="{{url('/home/chapter/css/core.packed.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{url('/home/chapter/css/model.packed.css')}}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="{{url('home/chapter/css/bookdetail.css')}}" media="all"/>
</head>
<body class="page-type-4 book-respond-list">
<div class="body-bg">
	<div id="wrap">
		<link rel="stylesheet" href="{{url('home/chapter/css/header.css')}}" type="text/css"/>
		<div class="new_header">
			<div class="header_b">
				<span class="fl">
				<a href="http://wenxue.motie.com">磨铁文学</a><span class="pd_10">|</span>
				<a href="http://www.motie.com/male">磨铁中文网</a><span class="pd_10">|</span>
				<a href="http://jw.motie.com">锦文小说网</a><span class="pd_10">|</span>
				<a href="http://mm.motie.com">墨墨言情网</a><span class="pd_10">|</span>
				<a href="http://yynovel.motie.com">逸云书院</a>
				</span>
				<!-- login -->
				<!-- nologin -->
				<span class="fr person-con">

				<div class="login-dialog">


				</div>
				 <div class="more_box" style="display:none;">
					<ul style="padding:3px 0px 0 14px">
						<li><a href="/home">首页</a></li>
					</ul>
				</div>
				</span>
			</div>
		</div>
		<!-- logo部分 -->
		<div class="new_wrap" style="width: 100%;">
			<div class="wrap_con">
				<div class="nav_show" style="position:relative;border-left:none;border-right:none;border-top:none;padding:0px;height:32px;">
					<div class="show_box" style="padding-left:10px;">
						<div class="first_list fl">
							<a href="/" style="padding-right:10px;">首页&nbsp;</a>
						</div>
						<div class="fl" style="padding-right:10px;margin:4px 0 0 15px;height:24px;line-height:24px;">
							<span class="sort_list">
								@foreach($list_s as $v)
							<a href="{{url('home/blist')}}/{{$v->id}}">{{$v->name}}</a>
								@endforeach
							</span>
						</div>

					</div>
				</div> 
				<div class="wrap_banner">
					<!-- 男频图书  -->
					<a data-namecard="false" boxid="home_male_book" data-control-type="shelf" target="_blank">
					<img src="{{url('home/chapter/picture/149812451561700011_955_100.jpg')}}"/></a>
					<!-- 女频  -->
				</div>
			</div>
			<div class="clear">
			</div>
		</div>
		<div id="main">
			<h1 class="p-title fl" style="margin-right:26px;">
			<a>{{$name['0']->bookname}}</a>
			</h1>
			<div class="clearfix">
			</div>
			<div class="left fl">
				<div class="left-bd">
					<div class="mod mod-article-list">
						<div class="bd">
							<div class="mod-basic-txtbox-layout">
								<div class="txtbox-item">
									<div class="txtbox-hd">
										<h2>未分卷</h2>
									</div>
									<div class="txtbox-bd">
										<ul class="list add-new-class">
										@foreach($list as $v)
											@if($v->tid >2)
											<li class="" createdate="2016-08-24 14:01:51">
											<a href="{{url('home/withindex')}}/{{$v->bid}}/{{$v->tid}}">{{$v->title}}<span class="desc">
														{{$v->uptime}} 
												</span></a><span style="color:red;font-size: 20px">vip</span>
											</li>
												@else
													<li class="" createdate="2016-08-24 14:01:51">
														<a href="{{url('home/withindex')}}/{{$v->bid}}/{{$v->tid}}">{{$v->title}}<span class="desc">
														{{$v->uptime}}
											</span>
													</li>
												@endif
											@endforeach
										</ul>
										<div class="cl">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end mod -->
				</div>
			</div>
			<!-- end left layout -->
			<div class="right fr">
				<div class="right-bd">
					<div class="mod side-list">
						<div class="hd mod-title">
							<div class="title-bd">
								<h2>奇闻趣事</h2>
							</div>
						</div>
						<div class="bd">
							<ul class="list" data-collect-id="123">
								@foreach($newslist as $v)
								<li>
								<a href="{{$v->url}}" data-collect-index="2">{{$v->title}}</a>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="mod side-list">
						<div class="hd mod-title">
							<div class="title-bd">
								<h2>娱乐新闻</h2>
							</div>
						</div>
						<div class="bd">
							<ul class="list" data-collect-id="126">
								@foreach($newslist2 as $v)
								<li>
								<a href="{{$v->url}}" data-collect-index="2">{{$v->title}}</a>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- end right layout -->
			<div class="cl">
			</div>
		</div>
	</div>
</div>
<!-- Sweet alert -->
<script src="{{url('/alert/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
<!--提示弹框-->
@if(!empty(session('error')))
	<script>
       (function () {
            swal({
                title:"{{session('error')}}",
                text: "点击确定跳转到登入页面！",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "确定",
                closeOnConfirm: false
            }, function () {
				{{--跳转到登入页--}}
                window.location.href="{{session('url')}}";
            });
        })();
	</script>
@endif
</body>
</html>