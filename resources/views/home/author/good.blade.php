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
@section('good')
    <li class="act">
        <a href="{{url('home/author/good').'/'.$_SESSION['id']}}">
            <span class="works"></span>物品
        </a>
    </li>
@endsection

@section('contant')
    <h3 class="title_h3"><span class="icon news"></span>我的物品</h3>
    <div class="newsListWrap">
        <p style="margin: 20px 0">你当前的物品:</p>

        <table class="table_integ">
            <tr>
                <th>商品图片</th>
                <th>商品名</th>
                <th>简介</th>
                <th></th>
            </tr>
            @foreach($data as $v)
                <tr >
                    <td><img src="{{asset($v->icon)}}" alt="加载失败" width="100" height="50"></td>
                    <td>
                       {{$v->goodname}}
                    </td>
                    <td>{{$v->intro}}</td>
                    <td >
                        <span class="btn"><a href="{{url('home/author/gooddel').'/'.$v->id}}">使用</a></span>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection

