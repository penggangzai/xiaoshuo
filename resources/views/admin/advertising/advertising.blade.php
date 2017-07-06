@extends('admin.index.index')

@section('link')
    <div class="container-fulid col-md-11" >
        <h3><span class="glyphicon glyphicon-list"></span>广告管理</h3>
        <table class="table table-bordered table-hover table-striped">
            <tr class="info">
                <th class="col-md-3">广告图片</th>
                <th class="col-md-3">广告地址</th>
                <th class="col-md-1">状态</th>
                <th class="col-md-1">位置</th>
                <th class="col-md-3">操作</th>
            </tr>
            @foreach ($data as $v)
                <tr class="danger">
                    <td>{{$v->img}}</td>
                    <td>{{$v->domain}}</td>
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
                    @if ($v->boundary == 1)左边广告@else右边广告@endif
                    </td>
                    <td>
                        <a href="{{url('/poster/posterselect')}}/{{$v->id}}" class="btn btn-danger btn-sm">查看详情</a>
                        <a href="{{url('/poster/postersingledata')}}/{{$v->id}}" class="btn btn-primary btn-sm">修改</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <script>
            function delAjaxjy(id) {
                console.log(id);
                $.ajax({
                    type: 'get',
                    url: "{{url('poster/posterstatejy')}}/" + id ,
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
                    url: "{{url('poster/posterstatejh')}}/" + id ,
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