@extends('admin.index.index')
@section('link')
    <div class="container-fulid col-md-10">
        <h3><span class="glyphicon glyphicon-list"></span>反馈列表</h3>
        <table class="table table-bordered table-hover table-striped">
            <tr class="info">
                <th class="col-md-1">编号(ID)</th>
                <th class="col-md-1">用户ID</th>
                <th class="col-md-1">主题</th>
                <th class="col-md-1">内容</th>
                <th class="col-md-2">操作</th>
            </tr>
            @if(!empty($list['0']))
            @foreach ($list as $v)
                <tr class="danger">
                    <td>{{$v->id}}</td>
                    <td>{{$v->uid}}</td>
                    <td>{{$v->title}}</td>
                    <td>{{$v->text}}</td>
                    <td>
                        <button class="btn btn-danger btn-sm del" data-id="{{$v->id}}">删除</button>
                    </td>
                </tr>
            @endforeach
            @else
            <tr><td colspan="5" style="height: 80px;font-size: 30px">暂无数据.....</td></tr>
            @endif

        </table>
        @endsection
        <script src="{{asset('/js/app.js')}}"></script>
        <script>
            $(function () {
                // 触发用户删除
                $('.del').click(function () {
                    var ac_id = $(this).attr('data-id');
                    var obj = $(this).parents('tr');
                    swal({
                        title: "您确定要删除这条信息吗",
                        text: "删除后将无法恢复，请谨慎操作！",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "确定",
                        closeOnConfirm: false
                    }, function () {
                        delAjax(ac_id, obj);// 执行删除操作
                    });
                });

            });

            // 执行AJAX删除的操作
            function delAjax(id, obj) {
                $.ajax({
                    type: 'get',
                    url: "{{url('admin/fdel')}}/" + id,
                    dateType: 'json',
                    success: function (data) {
                        console.log(data);
                        if (data) {
                            (function () {
                                swal({
                                    title: "删除成功!",
                                    type: "success"
                                });
                                obj.remove();
                            })();
                        } else {
                            (function () {
                                swal({
                                    title: "删除失败!",
                                    type: "warning"
                                });
                            })();
                        }
                    },
                    error: function () {
                        // AJAX执行失败
                        alert('ajax操作失败');
                    }
                });
            }

        </script>


