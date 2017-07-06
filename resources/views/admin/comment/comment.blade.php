@extends('admin.index.index')

@section('link')
    <div class="container-fulid col-md-11" >
        <h3><span class="glyphicon glyphicon-list"></span>评论列表</h3>
        <table class="table table-bordered table-hover table-striped">
            <tr class="info">
                <th class="col-md-1">编号(ID)</th>
                <th class="col-md-1">书籍(ID)</th>
                <th class="col-md-1">用户(ID)</th>
                <th class="col-md-1">点赞数</th>
                <th class="col-md-3">评论内容</th>
                <th class="col-md-1">状态</th>
                <th class="col-md-2">操作</th>
            </tr>
            @foreach ($data as $v)
                <tr class="danger">
                    <td>{{$v->id}}</td>
                    <td>{{$v->bid}}</td>
                    <td>{{$v->uid}}</td>
                    <td>{{$v->agree}}</td>
                    <td>
                        <div style="height:20px; overflow:hidden; text-overflow:ellipsis;">{{$v->comment}}</div>
                    </td>
                    @if ($v->status == 1)
                    <td id ="{{$v->id}}">
                        <button class="btn btn-danger btn-sm zhi" onclick="delAjaxjy({{$v->id}})" >
                            显示
                        </button>
                    </td>
                    @else
                    <td id ="{{$v->id}}">
                        <button class="btn btn-danger btn-sm zhi" onclick="delAjaxjh({{$v->id}})">
                            隐藏
                        </button>
                    </td>
                    @endif
                    <td>
                        <a href="{{url('/comment/commentselect')}}/{{$v->id}}" class="btn btn-danger btn-sm">查看评论</a>
                        <a href="{{url('/comment/commentsingledata')}}/{{$v->id}}" class="btn btn-primary btn-sm">修改</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <script>
            function delAjaxjy(id) {
                console.log(id);
                $.ajax({
                    type: 'get',
                    url: "{{url('comment/commentstatejy')}}/" + id ,
                    dateType: 'json', // 处理返回的响应值为JSON
                    success: function (data) {
                        console.log(data);
                        if (data == 1) {
                            document.getElementById(id).innerHTML = '<button class="btn btn-danger btn-sm zhi" onclick="delAjaxjh('+id+')" >隐藏</button>';
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
                    url: "{{url('comment/commentstatejh')}}/" + id ,
                    dateType: 'json', // 处理返回的响应值为JSON
                    success: function (data) {
                        console.log(data);
                        if (data == 1) {
                            document.getElementById(id).innerHTML = '<button class="btn btn-danger btn-sm zhi" onclick="delAjaxjy('+id+')" >显示</button>';
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