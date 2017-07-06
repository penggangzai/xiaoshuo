@extends('home.index')
@section('not')
<marquee style="font-size: 25px;color:blue">{{$not->title}}</marquee>
@endsection
@section('link')
    <link rel="stylesheet" type="text/css" href="{{asset('home/index/css/dist/autocomplete.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/index/css/style.css')}}">

@endsection
@section('MP3')
    @if($mp->display == '2')
    <span style="float: left;display:none;">
        <audio controls autoplay loop style="width:160px;background: red" src="{{$mp->url}}">
        </audio>
    </span>
    @else
   <span style="float: left;">
        <audio controls autoplay loop style="width:160px;background: red" src="{{$mp->url}}">
        </audio>
    </span>
    @endif
@endsection

@section('contant')
    @foreach($poster1 as $v)
        <div id="div1">
            <a href="{{$v->domain}}">
                <img src="{{ url($v->img) }}">
            </a>
        </div>
    @endforeach
    @foreach($poster2 as $v)
        <div id="div2">
            <a href="{{$v->domain}}">
                <img src="{{ url($v->img) }}">
            </a>
        </div>
    @endforeach
    <div class="container">
        <div class="row" style="height: 50px">

        </div>
    </div>
    <div class="g-bdw">
        <div class="g-bd g-bd-large g-bd-n">
            <section class="g-sec f-cb" style="margin-top:26px;margin-bottom:-7px;">
                <!-- 左边栏目 -->
                <div class="m-col fl">
                    <header><b class='icon-rmd'></b>
                        <h2>本周强推</h2>
                    </header>
                    <div class="m-ranklist m-ranklist-week">
                        <ul id="J_RankDaily">
                            @foreach($book_s as $v)
                                <li>
                                    <p class="fold" style="display:block;">
                                        <a href="{{url('home/blist')}}/{{$v->cid}}" target="_blank">
                                            <i>[{{$v->name}}]</i>
                                        </a>
                                        <a href="{{url('home/deta')}}/{{$v->bid}}" title="{{$v->bookname}}"
                                           target="_blank">{{$v->bookname}}</a>
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- 中间栏目 -->
                <div class="m-col m-col-m fl">
                    <!-- 轮播 -->
                    <div id="J_Slider01" class="m-mainslider">
                        <div class="slider">

                            <ul class="j-slider">
                                @foreach($book as $v)
                                    <li>
                                        <a href="{{url('home/deta')}}/{{$v->bid}}" target="_blank" data-model="ad"
                                           data-opration="ad_index"
                                           title="{{$v->bookname}}">
                                            <img src="{{url($v->url)}}" srcset="" width="200" height="280"
                                                 alt="{{$v->bookname}}">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        <div class="m-control">
                            @foreach($book as $v)
                                <div class="m-intro j-intro">
                                    <a href="{{url('home/deta')}}/{{$v->bid}} "
                                       target="_blank" title="{{$v->bookname}}">
                                        <h2>{{$v->bookname}}</h2>
                                    </a>
                                    <span>{{$v->wirter}}</span>
                                    <a href="{{url('home/deta')}}/{{$v->bid}}"
                                       target="_blank" title="{{$v->bookname}}">
                                        <p>
                                            {{$v->intro}}
                                        </p>
                                    </a>
                                </div>
                            @endforeach
                            <ol class="j-control">
                                @foreach($book as $k => $v)
                                    <li title="{{$v->bookname}}">
                                        <a target="_blank" href="{{url('home/deta')}}/{{$v->bid}}"
                                           title="{{$v->bookname}}">
                                            <img src="{{asset($v->url)}}" srcset="" width="58" height="82"
                                                 alt="{{$v->bookname}}"><b></b>
                                        </a>
                                        <span>{{$k+1}}</span>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                    <div class="m-headlines">
                        <div class="m-col fl">
                            <h3>
                                <a>{{$news[0]->description}}</a>
                            </h3>
                            <div class="m-titlelist">
                                <ul>
                                    @foreach($news as $val)
                                    <li class="new">
                                        <a href="{{url($val->url)}} " target="_blank">{{$val->title}}<i></i>
                                        </a>
                                    </li>

                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="m-col fr">
                            <h3>
                                <a>{{$news2[0]->description}}</a>
                            </h3>
                            <div class="m-titlelist">
                                <ul>
                                    @foreach($news2 as $val2)

                                    <li>
                                        <a href="{{$val2->url}}  " target="_blank" >
                                            {{$val2->title}}
                                        </a>
                                    </li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 右边栏目 -->
                <div class="m-col fr">
                    <header><b class='icon-hot'></b>
                        <h2>好评榜</h2>
                    </header>
                    <div class="m-ranklist">
                        <ul id="J_RankHotSell">
                            @foreach($book_ss as $k=>$v)
                                @if($k <= '8')
                                    <li>
                                        <p class="fold" style="display:block;">
                                            <a style="font-size: 8px;" target="_blank">
                                                <i>[{{$v->wirter}}]</i>
                                            </a>
                                            <a href="{{url('home/deta')}}/{{$v->id}}" title="{{$v->bookname}}"
                                               target="_blank">{{$v->bookname}}</a>
                                        </p>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>
            <section class="g-sec">
                <div class="m-book-six">
                    <ul class="content">
                        @foreach($book as $v)
                            <li>
                                <a href="{{url('home/deta')}}/{{$v->bid}}" target="_blank" title="{{$v->bookname}}"><img
                                            src="{{asset($v->url)}}"
                                            srcset=""
                                            width="142" height="199"
                                            alt="{{$v->bookname}}"></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
            <!-- 人气精品 -->
            <section class="g-sec">
                <div class="m-col m-col-l fl">
                    <header>
                        <h2>人气精品</h2>
                    </header>
                    <div class="m-3dSlider" id='J_3DSlider'>
                        <div class="inner j-slider">
                            @foreach($book_g as $v)
                                <div class="j-sliderItem animate">
                                    <a href="{{url('home/deta')}}/{{$v->bid}}" target="_blank" title="桃运小村医">
                                        <img width="94" height="124" src="{{asset($v->url)}}" srcset="">
                                    </a>
                                </div>
                            @endforeach
                        </div>

                        @foreach($book_g as $v)
                            <div class="m-intro j-intro">
                                <a href="{{url('home/deta')}}/{{$v->bid}}  " target="_blank" title="{{$v->bookname}}">
                                    <h2>{{$v->bookname}}</h2>
                                </a>
                                <p>
                                    {{$v->intro}}
                                </p>
                                <a class="btn" href="{{url('home/withindex')}}/{{$v->bid}}" target="_blank" title="桃运小村医" style="height:45px;">立即阅读</a>
                            </div>
                        @endforeach
                    </div>
                    {{--人气精品结束--}}
                </div>
            </section>

            <section class="fenlei">
                <div class="m-col m-col-l fl fen-fl clearfix">
                    <header style="margin-bottom: 20px;">
                        <h2>分类推荐</h2>
                    </header>
                    <ul class="ul clearfix">
                        @foreach($book_s as $v)
                            <li>
                                <div class="m-book-cata">
                                    <h4><span>{{$v->name}}</span></h4>
                                    <div class="m-bookele">
                                        <a href="{{url('home/deta')}}/{{$v->bid}}" class="cover" target="_"
                                           title=""><img width="97" height="136"
                                                         src="{{asset($v->url)}}"
                                                         srcset="" alt="厂哥厂妹"></a>
                                        <h5><a href="{{url('home/deta')}}/{{$v->bid}}" target="_blank"
                                               title="">{{$v->bookname}}</a></h5>
                                        <p class="info">
                                        </p>
                                        <p class="desc">
                                            {{$v->intro}}
                                        </p>
                                        <a class="read" href="{{url('home/withindex')}}/{{$v->bid}}">立即阅读<i></i></a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="m-listele" style="float:right;border:1px solid #FFF; width:250px; height:375px; margin-top:90px; text-align:center;">
                    @foreach($jsonObjj as $k=>$v)
                    <h2 style="color:#CBC429;">星座运气</h2>
                    <hr>
                    <h4 style="float:left;color:#FF216C;">贵人星座:</h4><h5  style="color:#FF216C;">{{$v->grxz}}</h5><br>
                    <h4 style="float:left;color:#FF21F2;">运势简评:</h4><h5  style="color:#FF21F2;">{{$v->general_txt}}</h5><br>
                    <h4 style="float:left;color:#9D21FF;">运气时间:</h4><h5  style="color:#9D21FF;">{{$v->lucky_time}}</h5><br>
                    <h4 style="float:left;color:#3E21FF;">工作运势:</h4><h5  style="color:#3E21FF;">{{$v->work_txt}}</h5><br>
                    <h4 style="float:left;color:#2183FF;">爱情运势:</h4><h5  style="color:#2183FF;">{{$v->love_txt}}</h5><br>
                    <h4 style="float:left;color:#21FCFF;">财富运势:</h4><h5  style="color:#21FCFF;">{{$v->money_txt}}</h5><br>
                    <h4 style="float:left;color:#21FF90;">吉色    :</h4><h5  style="color:#21FF90;">{{$v->lucky_color}}</h5><br>
                    <h4 style="float:left;color:#21FF43;">幸运数字:</h4><h5  style="color:#21FF43;">{{$v->lucky_num}}</h5><br>
                    <h4 style="float:left;color:#74FF21;">吉利方位:</h4><h5  style="color:#74FF21;">{{$v->lucky_direction}}</h5><br>
                    <h4 style="float:left;color:#B2FF21;">综合指数:</h4><h5  style="color:#B2FF21;">{{$v->summary_star}}</h5><br>
                    <h4 style="float:left;color:#FFFF21;">爱情指数:</h4><h5  style="color:#FFFF21;">{{$v->love_star}}</h5><br>
                    <h4 style="float:left;color:#FFD121;">财富指数:</h4><h5  style="color:#FFD121;">{{$v->money_star}}</h5><br>
                    <h4 style="float:left;color:#FFA521;">工作指数:</h4><h5  style="color:#FFA521;">{{$v->work_star}}</h5><br>
                    @endforeach
                </div>





               <!--  <div class="m-col fr">
                    <header>
                        <h2>月票榜</h2>
                    </header>
                    <div class="m-ranklist">
                    </div>
                    <header style="margin-top:50px;">
                        <h2>新书榜</h2>
                    </header>
                    <div class="m-bang">

                    </div> -->
                <!-- </div> -->
            </section>
            <div class="clearfix"></div>
            <section class="g-sec">
                <div class="m-book-six">
                    <ul class="content">
                        @foreach($book as $v)
                            <li>
                                <a href="{{url('home/deta')}}/{{$v->bid}}" target="_blank" title="{{$v->bookname}}">
                                    <img src="{{asset($v->url)}}"
                                         srcset=""
                                         width="142" height="199" alt="{{$v->bookname}}">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>
        <div class="g-bd-cat">
            <div class="m-partnerlist">
                <h3>合作伙伴</h3>
                <p class="f-cb">
                    @foreach($exchange as $k=>$v)
                        @if($k <= '5')
                            <a href="{{$v->domain}}" target="_blank" title="磨铁中文网" nofollow>{{$v->exchange}}</a>
                        @endif
                    @endforeach
                </p>
            </div>
        </div>
    </div>
@endsection
