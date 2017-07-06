@extends('home.member.index')
@section('link')
    @parent
    <link rel="stylesheet" href="{{asset('home/member/css/member.css')}}">
    <link rel="stylesheet" href="{{asset('css/fileinput.css')}}">
    <link href="http://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{ url('/js/fileinput.js') }}"></script>

@endsection
@section('contant')
    <p>
        <span>您的位置 : </span>
        <a href="{{url('member/index')}}">首页
        </a> > 我的书架
    </p>
    <table class="table table-condensed table-hover">
        <tr class="success">
            <th>书名</th>
            <th>类型</th>
            <th>最新章节</th>
            <th>跟新时间</th>
            <th>操作</th>
        </tr>
        @if(empty($data))
        <tr class="danger">
            <td colspan="5" style="text-align: center;font-size: 30px" >你还没有添加书籍</td>
        </tr>
        @else
            @foreach($data  as  $k =>$v)
            <tr class="info">
                <td><a href="{{url('home/deta').'/'.$k}}">{{$v['bookname']}}</a></td>
                <td>{{$v['name']}}</td>
                <td><a href="{{url('home/withindex').'/'.$k.'/'.$v['count']}}">{{$v['title']}}</a></td>
                <td>{{$v['uptime']}}</td>
                <td><a href="{{url('member/collectiondel').'/'.$k}}" class="btn btn-danger btn-sm">删除</a></td>
            </tr>
            @endforeach
        @endif
    </table>
@endsection
@section('script')
    @parent
@endsection
