@extends('admin.index.index')

@section('link')
    <div class="container-fulid col-md-11" >
        <h3><span class="glyphicon glyphicon-list"></span>用户列表</h3>
        <table class="table table-bordered table-hover table-striped">
            <tr class="info">
                <th class="col-md-1">头像</th>
                <th class="col-md-1">编号(ID)</th>
                <th class="col-md-1">手机号</th>
                <th class="col-md-3">职位</th>
                <th class="col-md-2">账号</th>
                <th class="col-md-2">最后上线时间</th>
                <th class="col-md-1">状态</th>
                <th class="col-md-1">操作</th>
            </tr>
            @foreach ($data as $v)
                @if($v->user != 'admin')
                <tr class="danger">
                    @if(empty($v->icon))
                        <td><img src="{{asset('picture/wx_314_1.png')}}" alt="" width="50" height="50"></td>
                    @else
                        <td><img src="{{asset($v->icon)}}" alt="" width="100" height="30"></td>
                    @endif

                    <td>{{$v->id}}</td>
                    <td>{{$v->phone}}</td>
                    <td>
                        @foreach($list as $k => $val)
                            @if($k == $v->id)
                                @foreach($val as $val1)
                                {{$val1}}&nbsp;
                                @endforeach
                            @else

                             @endif
                        @endforeach
                    </td>
                    <td>{{$v->user}}</td>
                    <td>{{$v->logintime}}</td>
                    <td><a  class="btn btn-primary btn-sm si" data-id="{{$v->id}}" stutus="{{$v->status}}" data-phone="{{$v->user}}">
                            {{($v->status==1)?'运行':'禁用'}}
                        </a>
                    </td>
                    <td>
                        <a href="{{url('/admin/auser/editl')}}/{{$v->id}}" class="btn btn-primary btn-sm">编辑</a>
                    </td>
                </tr>
                @else

                @endif
            @endforeach
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
                    url: "{{url('/admin/auser/edit')}}/" + id,
                    dateType: 'json', // 处理返回的响应值为JSON
                    data:'stutus='+stu,
                    success: function (data) {
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