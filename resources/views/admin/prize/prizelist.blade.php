@extends('admin.index.index')
@section('link')
    <div class="container-fulid col-md-10">
        <h3><span class="glyphicon glyphicon-list"></span>书籍列表</h3>
        <table class="table table-bordered table-hover table-striped">
            <tr class="info">
                <th class="col-md-1">头像</th>
                <th class="col-md-1">编号(ID)</th>
                <th class="col-md-1">商品名</th>
                <th class="col-md-1">状态</th>
                <th class="col-md-1">价格</th>
                <th class="col-md-1">简介</th>
                <th class="col-md-2">操作</th>
            </tr>
            @foreach ($list as $v)
                <tr class="danger">
                    <td><img src="{{asset($v->icon)}}" alt="" width="50" height="100"></td>
                    <td>{{$v->id}}</td>
                    <td>{{$v->goodname}}</td>
                    <td><a class="btn-primary btn-sm" style="color: #FFF0F0">
                            {{($v->status==1)?'上架':'下架'}}
                        </a>
                    </td>
                    <td>{{$v->price}}</td>
                    <td>{{$v->intro}}</td>
                    <td>
                        <a href="{{url('admin/prize/edit')}}/{{$v->id}}" class="btn btn-primary btn-sm" style="color: #FFF0F0">修改</a>
                        <a href="{{url('admin/prize/del').'/'.$v->id}}" class="btn btn-danger btn-sm del">删除</a>
                    </td>
                </tr>
            @endforeach
        </table>
        @endsection



