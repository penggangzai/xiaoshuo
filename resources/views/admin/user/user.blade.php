@extends('admin.index.index')

@section('link')
    <div class="container-fulid col-md-11" >
        <h3><span class="glyphicon glyphicon-list"></span>用户列表</h3>
        <table class="table table-bordered table-hover table-striped">
            <tr class="info">
                <th class="col-md-1">编号(ID)</th>
                <th class="col-md-1">手机号</th>
                <th class="col-md-2">邮箱</th>
                <th class="col-md-2">最后上线时间</th>
                <th class="col-md-1">状态</th>
                <th class="col-md-2">用户注册时间</th>
                <th class="col-md-3">操作</th>
            </tr>
            @foreach ($data as $v)
                <tr class="danger">
                    <td>{{$v->id}}</td>
                    <td>{{$v->phone}}</td>
                    <td>{{$v->email}}</td>
                    <td>{{$v->logintime}}</td>
                        @if ($v->status == 1)
                        <td id ="{{$v->id}}">
                            <button class="btn btn-danger btn-sm zhi" onclick="delAjaxjy({{$v->id}})" >
                                激活
                            </button>
                        </td>
                        @else
                        <td id ="{{$v->id}}">
                            <button class="btn btn-danger btn-sm zhi" onclick="delAjaxjh({{$v->id}})">
                                禁用
                            </button>
                        </td>
                        @endif
                    <td>{{$v->utime}}</td>
                    <td>
                        <a href="{{url('/admin/userselect')}}/{{$v->id}}" class="btn btn-danger btn-sm">查看用户</a>
                        <a href="{{url('/admin/usersingledata')}}/{{$v->id}}" class="btn btn-primary btn-sm">编辑</a>
                        <button class="btn btn-danger btn-sm del" data-id="{{$v->id}}" data-phone="{{$v->phone}}">删除</button>
                    </td>
                </tr>
            @endforeach
        </table>
        <script src="{{asset('js/app.js')}}"></script>
        <script>
            $(function () {
                // 触发用户删除
                $('.del').click(function () {
                    var id = $(this).attr('data-id');
                    var phone = $(this).attr('data-phone');
//                    console.log(phone);
                    if (confirm("您确定要删除 [" +phone+ "] 用户么?")) {
                        var obj = $(this).parents('tr').remove();
                        delAjax(id, obj);// 执行删除操作
                    }
                });

            });
            // 执行AJAX删除的操作
            function delAjax(id, obj) {
                $.ajax({
                    type: 'get',
                    url: "{{url('/admin/userdelete')}}/" + id,
                    dateType: 'json', // 处理返回的响应值为JSON
                    success: function (data) {
                        console.log(data);
                        if (data) {
                            alert('删除成功!');
                            obj.remove();
                        } else {
                            alert('删除失败!');
                        }
                    },
                    error: function () {
                        // AJAX执行失败
                        alert('ajax操作失败');
                    }
                });
            }




            function delAjaxjy(id) {
                console.log(id);
                $.ajax({
                    type: 'get',
                    url: "{{url('admin/userstatejy')}}/" + id ,
                    dateType: 'json', // 处理返回的响应值为JSON
                    success: function (data) {
                        console.log(data);
                        if (data == 1) {
                            document.getElementById(id).innerHTML = '<button class="btn btn-danger btn-sm zhi" onclick="delAjaxjh('+id+')" >禁用</button>';
                        } else {

                        }
                    },
                    error: function () {
                    // AJAX执行失败
                    alert('ajax操作失败');
                    }
                });
            }


            function delAjaxjh(id) {
                console.log(id);
                $.ajax({
                    type: 'get',
                    url: "{{url('admin/userstatejh')}}/" + id ,
                    dateType: 'json', // 处理返回的响应值为JSON
                    success: function (data) {
                        console.log(data);
                        if (data == 1) {
                            document.getElementById(id).innerHTML = '<button class="btn btn-danger btn-sm zhi" onclick="delAjaxjy('+id+')" >激活</button>';
                        } else {

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