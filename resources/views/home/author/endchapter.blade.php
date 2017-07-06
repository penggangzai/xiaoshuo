@extends('home.author.model')
@section('link')
    <link rel="stylesheet" href="{{asset('home/css/work.css')}}">
@endsection
@section('info')
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
    <p>您的位置&nbsp;&nbsp;&nbsp;章节详情</p>
    <p>详细章节为:</p>
    <table class="table" cellspacing="0" cellpadding="5">
        <tr class="th">
            <th>id</th>
            <th>章节名</th>
            <th>章节字数</th>
            <th>状态</th>
        </tr>
        @foreach($data as $v)
        <tr>
            <td>{{$v->tid}}</td>
            <td>{{$v->title}}</td>
            <td>{{$v->count}}</td>
            <td>@if($v->status == 1)通过 @else 待审核 @endif</td>
        </tr>
         @endforeach
    </table>
    <div class="clear"></div>
@endsection

