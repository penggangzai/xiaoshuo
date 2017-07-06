@extends('admin.index.index')

@section('link')
    <div class="container-fulid col-md-11" >
        <h3><span class="glyphicon glyphicon-list"></span>职位列表</h3>
        <table class="table table-bordered table-hover table-striped">
            <tr class="info">
                <th class="col-md-1">编号(ID)</th>
                <th class="col-md-1">职位</th>
                <th class="col-md-1">权限</th>
                <th class="col-md-2">描述</th>
                <th class="col-md-5">操作</th>
            </tr>
            @foreach ($data as $v)
                <tr class="danger">
                    <td>{{$v->id}}</td>
                    <td>{{$v->duty}}</td>
                    <td></td>
                    <td>{{$v->desc}}</td>
                    <td>
                        <a href="{{url('admin/role/editl')}}/{{$v->id}}" class="btn btn-primary btn-sm" data-toggle="modal" >编辑</a>
                        <button class="btn btn-danger btn-sm del" data-id="{{$v->id}}" data-phone="{{$v->duty}}">删除</button>
                    </td>
                </tr>
            @endforeach
        </table>
        <script>
            $(function () {
                // 触发用户删除
                $('.del').click(function () {
                    var id = $(this).attr('data-id');
                    var phone = $(this).attr('data-phone');
                    if (confirm("您确定要删除 职位为[" +phone+ "]吗?")) {
                        var obj = $(this).parents('tr');
                        delAjax(id, obj);// 执行删除操作
                    }
                });

                $('.si').click(function () {
                    var id = $(this).attr('data-id');
                    var stu = $(this).attr('stutus');
                    var phone = $(this).attr('data-phone');
                    var obj = $(this);
                    if (confirm("您确定要改变职位为[" +phone+ "]的状态吗?")) {
                        stutus(stu,id,obj);
                    }
                });

            });
            // 执行AJAX删除的操作
            function delAjax(id, obj) {
                $.ajax({
                    type: 'get',
                    url: "{{url('/admin/role/del')}}/" + id,
                    dateType: 'json', // 处理返回的响应值为JSON
                    success: function (data) {
                        console.log(data);
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
            function stutus(stu,id,obj) {
                $.ajax({
                    type: 'get',
                    url: "{{url('/admin/role/edit')}}/" + id,
                    dateType: 'json', // 处理返回的响应值为JSON
                    data:'stutus='+stu,
                    success: function (data) {
                        if (data.stutus) {
                            if(data.info == 1){
                                obj.attr('stutus',data.info);
                                obj.attr('class','btn btn-primary btn-sm si');
                                obj.html('激活');
                            }else{
                                obj.attr('class','btn btn-danger btn-sm si');
                                obj.attr('stutus',data.info);
                                obj.html('禁用');
                            }
                        } else {
                            alert('修改失败');
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