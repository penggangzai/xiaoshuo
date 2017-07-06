@extends('admin.index.index')

@section('link')
    <div class="container-fulid col-md-11" >
        <h3><span class="glyphicon glyphicon-list"></span>评分管理</h3>
        <table class="table table-bordered table-hover table-striped">
            <tr class="info">
                <th class="col-md-1">ID</th>
                <th class="col-md-2">书名</th>
                <th class="col-md-2">作者</th>
                <th class="col-md-1">评分数</th>
                <th class="col-md-3">操作</th>
            </tr>
            @foreach ($data as $v)
                <tr class="danger">
                    <td>{{$v->id}}</td>
                    <td>{{$v->bookname}}</td>
                    <td>{{$v->wirter}}</td>
                    <td>{{$v->score}}</td>
                    <td>
                        <a href="{{url('/Grade/Gradeselect')}}/{{$v->id}}" class="btn btn-danger btn-sm">查看详情</a>
                    </td>
                </tr>
            @endforeach
        </table>
@endsection