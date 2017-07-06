@extends('home.author.model')
@section('link')
    @parent
@endsection
@section('contant')
    <h3 class="title_h3"><span class="icon news"></span>灵异新闻</h3>
    <div class="newsListWrap">
        <!-- 新闻列表 -->
        <ul id="newsList" class="clear">
            @foreach($data as $v)
                <li class="clear">
                    <span><img src="{{$v->picUrl}}" alt="加载失败" width="100" height="50"></span>
                    <span >
                        <a href="{{$v->url}}">{{$v->title}}</a>
                    </span>
                    <span class="right line">{{$v->ctime}}</span>
                </li>
            @endforeach
        </ul>
        <span class="right">
                @if($page <= 0)
                <span>上一页</span>|
                <span>
                        <a href="{{url('home/author/index').'/'.($page+1)}}">下一页
                        </a>
                    </span>
            @else
                <span>
                        <a href="{{url('home/author/index').'/'.($page-1)}}">上一页
                        </a>
                    </span>|
                <span>
                        <a href="{{url('home/author/index').'/'.($page+1)}}">下一页
                        </a>
                    </span>
            @endif
            </span>
    </div>

@endsection
