@extends('admin.index.index')
@section('link')
    <div class="container-fulid col-md-10">
        <h3><span class="glyphicon glyphicon-list"></span>轮播图列表</h3>
        <table class="table table-bordered table-hover table-striped">
            <tr class="info">
                <th class="col-md-1">编号(ID)</th>
                <th class="col-md-1">NAME</th>
                <th class="col-md-1">添加时间</th>
                <th class="col-md-1">状态</th>
                <th class="col-md-2">操作 <a href="" onclick="history.go(-1)">返回上一页</a></th>
            </tr>
            @foreach ($list as $v)
                <tr class="danger">
                    <td>{{$v->id}}</td>
                    <td>{{$v->bname}}</td>
                    <td></td>
                    <td><a href="{{url('admin/face')}}/{{$v->id}}" class="btn btn-danger btn-sm si" data-id="{{$v->id}}" face="{{$v->face}}" style="color: #FFF0F0">
                            {{($v->face==1)?'显示':'隐藏'}}
                        </a>
                    </td>
                    <td>
                        <a href="{{url('admin/bansect/')}}/{{$v->id}}" class="btn btn-danger btn-sm" style="color: #FFF0F0">详情</a>
                        <button class="btn btn-danger btn-sm del" data-id="{{$v->id}}">删除</button>
                    </td>
                </tr>
            @endforeach
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
                    url: "{{url('admin/bannerdels')}}/" + id,
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


