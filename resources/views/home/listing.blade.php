@extends('home.index')
@section('link')
	<link rel="stylesheet" href="{{ url('home/list/css/listing.css') }}">
	<script src="{{ url('/js/app.js') }}"></script>
	<script type="text/javascript">

        $('#click1 a:eq(0)').addClass('selected');
        $('#click1 a').click(function(){
            $(this).addClass('selected').siblings('a').removeClass('selected');
        })

        $('#click2 a:eq(0)').addClass('selected');
        $('#click2 a').click(function(){
            $(this).addClass('selected').siblings('a').removeClass('selected');
        })

        $('#click3 a:eq(0)').addClass('selected');
        $('#click3 a').click(function(){
            $(this).addClass('selected').siblings('a').removeClass('selected');
        })
        $(function (){
            $('#zby button:eq(0)').addClass('yan');
            $('#zby ul:eq(0)').show();

            $('#zby button').click(function(){
                $(this).addClass('yan').siblings('button').removeClass('yan');

                $(this).closest('ul ul').slideDown().siblings('ul').slideUp();
            });
        })
	</script>
@endsection

@section('contant')
	<div class="container">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="total">
					<div class="middle">
						<div class="middlehead">
						</div>
						<div class="middleleft"><!--左边-->
							<ul id="nav" class="package">
								<li class="you"><h4>图书书库</h4></li>
								<ul>
									@foreach($list_s as $v)
									<li><a href="{{url('home/blist')}}/{{$v->id}}" {{($v->id== $id)?'style=background:#f4f4f4;color:red;':''}}>{{$v->name}}</a></li>
									@endforeach

								</ul>
							</ul>
							<br><br>
						</div>


						<div class="middleright"><!--右边-->
							<div class="middlerightt">
								<ul>
									<li id="click1"><h5>付费行政:</h5>&nbsp;
										<a>全部</a>&nbsp;
										<a>免费作品</a>&nbsp;
										<a>付费作品</a>
									</li><hr>


									<li id="click2"><h5>上架时间:</h5>&nbsp;
										<a>全部</a>&nbsp;
										<a>七日内</a>&nbsp;
										<a>半月内</a>&nbsp;
										<a>一个月内</a>&nbsp;
										<a>三个月内</a>
									</li><hr>


									<li id="click3"><h5>排序方式:</h5>&nbsp;
										<a>最热</a>&nbsp;
										<a>最新</a>
									</li><hr>

								</ul>
							</div>

							<div class="middlerightb">
								@foreach($book_s as $v)
								<div class="col-md-3">
									<div class="picture">
										<a href="{{url('home/deta')}}/{{$v->bid}}">
											<img src="{{ url($v->url) }}" width="150" height="200">
										</a>
									</div>
								</div>
								<div class="col-md-3">
									<div class="height">
										<h3><b>{{$v->bookname}}<b></h3>
										<h4 class="flutter">作者:</h4><h4 class="golden"><b>{{$v->wirter}}</b><h4>
												<h4 class="toop">简介:</h4>
												<h4 style="overflow:hidden; text-overflow:ellipsis;height: 90px">{{$v->intro}}</h4>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>

@endsection

