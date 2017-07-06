@extends('admin.index.index')

@section('link')
    <div class="container-fulid col-md-11" >
        <h3><span class="glyphicon glyphicon-list"></span>权限列表</h3>
        <table class="table table-bordered table-hover table-striped">
            <tr class="info">
                <th class="col-md-1">编号(ID)</th>
                <th class="col-md-1">权限名称</th>
                <th class="col-md-1">控制器</th>
                <th class="col-md-2">方法</th>
                <th class="col-md-5">操作</th>
            </tr>
            @foreach ($data as $v)
                <tr class="danger">
                    <td>{{$v->id}}</td>
                    <td>{{$v->control_name}}</td>
                    <td>{{$v->control}}</td>
                    <td>{{$v->func}}</td>
                    <td>
                        <a href="{{url('admin/control/edit/'.$v->id.'')}}" class="btn btn-primary btn-sm" data-toggle="modal"  data-id="{{$v->id}}">编辑</a>
                        <button class="btn btn-danger btn-sm del" data-id="{{$v->id}}" data-phone="{{$v->control_name}}">删除</button>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$data->links()}}

        <script>
            $(function () {
                // 触发用户删除
                $('.del').click(function () {
                    var id = $(this).attr('data-id');
                    var phone = $(this).attr('data-phone');
                    if (confirm("您确定要删除权限为[" +phone+ "]吗?")) {
                        var obj = $(this).parents('tr');
                        delAjax(id, obj);// 执行删除操作
                    }
                });
            });
            // 执行AJAX删除的操作
            function delAjax(id, obj) {
                $.ajax({
                    type: 'get',
                    url: "{{url('/admin/control/del')}}/" + id,
                    dateType: 'json', // 处理返回的响应值为JSON
                    success: function (data) {

                        if (data) {
                            obj.remove();
                        } else {
                            alert(data.info);
                        }
                    },
                    error: function () {
                        // AJAX执行失败
                        alert('ajax操作失败');
                    }
                });
            }
        </script>
@endsection