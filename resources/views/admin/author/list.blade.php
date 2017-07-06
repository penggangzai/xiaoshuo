@extends('admin.index.index')

@section('link')
    <div class="container-fulid col-md-11" >
        <h3><span class="glyphicon glyphicon-list"></span>作家详情</h3>
        <table class="table table-bordered table-hover table-striped">
            <tr class="success">
                <th >电话</th>
                <th >{{$list->phone}}</th>
                <th >笔名</th>
                <th >{{$list->autorname}}</th>
                <th ></th>
                <th>注册时间</th>
                <th>{{date('Y-m-d H:i:s',$list->utime)}}</th>
            </tr>
            <tr class="info">
                <td>小说编号(ID)</td>
                <td>类型</td>
                <td>小说名</td>
                <td>完结状态</td>
                <td>上下架</td>
                <td>跟新时间</td>
                <td>订阅量</td>
            </tr>
            @if(empty($data[0]))
                <tr>
                    <td colspan="7"> 暂无创建</td>
                </tr>
            @else
                @foreach ($data as $v)
                    <tr class="danger">
                        <td>{{$v->id}}</td>
                        <td>{{$v->name}}</td>
                        <td>{{$v->bookname}}</td>
                        <td> {{($v->status==1)?'连载':'终结'}}</td>
                        <td>{{($v->status==1)?'上架':'下架'}}</td>
                        <td>{{$v->time}}</td>
                        <td>
                            @if(empty($v->subscribe)) 0 @else{{$v->subscribe}}@endif
                        </td>
                    </tr>
                    @endforeach
                @endif
        </table>

        <script>
                // 触发用户状态
                $('.si').click(function () {
                    var id = $(this).attr('data-id');
                    var stu = $(this).attr('stutus');
                    var phone = $(this).attr('data-phone');
                    var obj = $(this);
                    if (confirm("您确定要改变职位为[" + phone + "]的状态吗?")) {
                        stutus(stu, id, obj);
                    }
                });

            function stutus(stu,id,obj) {
                $.ajax({
                    type: 'get',
                    url: "{{url('/admin/author/edit')}}/" + id,
                    dateType: 'json', // 处理返回的响应值为JSON
                    data:'stutus='+stu,
                    success: function (data) {
                        console.log(data);
                        if (data.stutus) {
                            if(data.info == 1){
                                obj.attr('stutus',data.info);
                                obj.attr('class','btn btn-primary btn-sm si');
                                obj.html('运行');
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