@extends('home.author.model')
@section('link')
    <link rel="stylesheet" href="{{asset('home/css/work.css')}}">
@endsection
@section('index')
    <li>
        <a href="{{url('home/author/index')}}"><span class="home"></span>专区首页
        </a>
    </li>
    @endsection
@section('work')
    <li class="act">
        <a href="{{url('home/author/work').'/'.$_SESSION['id']}}">
            <span class="works"></span>作品管理
        </a>
    </li>
@endsection
@section('contant')
    <h3 class="title_h3 clear"><span class="icon news"></span>作品管理</h3>
    <p class="creat">
        <span>当前作品总数 @if(empty($count)) 0 @else {{$count}} @endif 本</span>
        <span class="right btn">
            <a href="{{url('home/author/addbook')}}">
                <i class="ico-calendar"></i>创建作品
            </a>
        </span>
    </p>
    <table class="table" cellspacing="0" cellpadding="5">
        <tr class="th">
            <th>书名</th>
            <th>最新章节</th>
            <th>章节总数</th>
            <th>分类</th>
            <th>收藏数</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @if(empty($data))
            <tr class="td">
                <td colspan="7" border="1">您还没有创建书籍</td>
            </tr>
        @else
            @foreach($data as$k => $v)
            <tr class="td">
                <td>{{$v['bookname']}}</td>
                <td>{{$v['title']}}</td>
                <td>{{$v['count']}}</td>
                <td>{{$v['name']}}</td>
                <td>{{$v['subscribe']}}</td>
                <td>@if($v['status'] == 2) 完结 @else 连载中 @endif </td>
                <td>
                    @if($v['status'] == 1)
                    <span class="btn"><a href="{{url('home/author/addchapter').'/'.$k}}?id={{$k}}" >新增章节</a></span>
                    <span class="btn"><a href="{{url('home/author/edit').'/'.$k}}">编辑信息</a></span>
                        @else
                    已经完结
                        @endif
                        <span class="btn"><a href="{{url('home/author/end').'/'.$k}}">已传章节</a></span>
                </td>
            </tr>
            @endforeach
        @endif
    </table>


@endsection
