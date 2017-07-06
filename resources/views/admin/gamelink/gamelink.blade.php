@extends('admin.index.index')

@section('link')
    <div class="container-fulid col-md-11" >
        <h3><span class="glyphicon glyphicon-list"></span>游戏链接列表</h3>
        <table class="table table-bordered table-hover table-striped">
            <tr class="info">
                <th class="col-md-1">编号(ID)</th>
                <th class="col-md-2">游戏名字</th>
                <th class="col-md-3">网址</th>
                <th class="col-md-1">状态</th>
                <th class="col-md-3">操作</th>
            </tr>
            @foreach ($data as $v)
                <tr class="danger">
                    <td>{{$v->id}}</td>
                    <td>{{$v->name}}</td>
                    <td>{{$v->domain}}</td>
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
                    <td>
                        <a href="{{url('/gamelink/gamelinkselect')}}/{{$v->id}}" class="btn btn-danger btn-sm">查看用户</a>
                        <a href="{{url('/gamelink/gamelinksingledata')}}/{{$v->id}}" class="btn btn-primary btn-sm">编辑</a>
                        <button class="btn btn-danger btn-sm del" data-id="{{$v->id}}">删除</button>
                    </td>
                </tr>
            @endforeach
        </table>
        <script>
            $(function () {
                // 触发用户删除
                $('.del').click(function () {
                    var id = $(this).attr('data-id');
//                    console.log(phone);
                    if (confirm("您确定删除吗?")) {
                        var obj = $(this).parents('tr').remove();
                        delAjax(id, obj);// 执行删除操作
                    }
                });

            });
            // 执行AJAX删除的操作
            function delAjax(id, obj) {
                $.ajax({
                    type: 'get',
                    url: "{{url('/gamelink/gamelinkdelete')}}/" + id,
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
                    url: "{{url('gamelink/gamelinkstatejy')}}/" + id ,
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
                    url: "{{url('gamelink/gamelinkstatejh')}}/" + id ,
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