@extends('admin.index.index')
@section('link')
    <div class="container-fulid col-md-10">
        <h3><span class="glyphicon glyphicon-list"></span>书籍列表</h3>
        <table class="table table-bordered table-hover table-striped">
            <tr class="info">
                <th class="col-md-1">编号(ID)</th>
                <th class="col-md-1">书籍名</th>
                <th class="col-md-1">添加时间</th>
                <th class="col-md-2">操作<a href="" onclick="history.go(-1)">返回上一页</a></th>
            </tr>
            @foreach ($list as $v)
                <tr class="danger">
                    <td>{{$v->id}}</td>
                    <td>{{$v->bookname}}</td>
                    <td>{{$v->time}}</td>
                    <td>
                        <a href="{{url('admin/sadd/')}}/{{$v->id}}" class="btn btn-danger btn-sm" style="color: #FFF0F0">添加章节</a>
                        <a href="{{url('admin/show/')}}/{{$v->id}}" class="btn btn-danger btn-sm" style="color: #FFF0F0">查看章节</a>
                        {{--<a href="{{url('admin/bookedit')}}/{{$v->id}}" class="btn btn-primary btn-sm">修改</a>--}}
                        {{--<button class="btn btn-danger btn-sm del" data-id="{{$v->id}}">删除</button>--}}
                    </td>
                </tr>
            @endforeach
        </table>
        {{$list->links()}}
        @endsection
        <script src="{{asset('/js/app.js')}}"></script>
        <script>
            $(function () {
                // 触发用户删除
                $('.del').click(function () {
                    var ac_id = $(this).attr('data-id');
                    if (confirm('您确定要 [ 删 除 ] 该用户么?')) {
                        var obj = $(this).parents('tr');
                        delAjax(ac_id, obj);// 执行删除操作
                    }
                });

            });
            // 执行AJAX删除的操作
            function delAjax(id, obj) {
                $.ajax({
                    type: 'get',
                    url: "{{url('admin/bkdel')}}/" + id,
                    dateType: 'json',
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
        </script>


