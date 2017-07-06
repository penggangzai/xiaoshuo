@extends('admin.index.index')
@section('link')
<div class="container-fulid col-md-10" >
  <h3><span class="glyphicon glyphicon-list"></span>分类列表</h3>
  <table class="table table-bordered table-hover table-striped">
    <tr class="info">
      <th class="col-md-1">编号(ID)</th>
      <th class="col-md-1">分类名</th>
      {{--<th class="col-md-1">PID</th>--}}
      <th class="col-md-1">PATH</th>
      <th class="col-md-1">状态</th>
      <th class="col-md-2">操作 <a href="" onclick="history.go(-1)">返回上一页</a></th>
    </tr>
    @foreach ($data as $v)
    <tr class="danger">
      <td>{{$v->id}}</td>
      <td>{{$v->name}}</td>
      {{--<td>{{$v->pid}}</td>--}}
      <td>{{$v->path}}</td>
      <td><a href="{{url('admin/state')}}/{{$v->display}}/{{$v->id}}" class="btn-primary btn-sm" style="color: #FFF0F0">
            {{($v->display==1)?'显示':'隐藏'}}
        </a></td>
      <td>
        <a href="{{url('admin/clist')}}?d={{$v->id}}" class="btn btn-danger btn-sm" style="color: #FFF0F0">查看子分类</a>
        <a href="{{url('admin/cateindex')}}/{{$v->id}}/{{$v->path}}" class="btn btn-primary btn-sm" style="color: #FFF0F0">添加子分类</a>
        <a href="{{url('admin/catedit')}}/{{$v->id}}" class="btn btn-primary btn-sm" style="color: #FFF0F0">编辑</a>
        <button class="btn btn-danger btn-sm del" data-id="{{$v->id}}" style="color: #FFF0F0">删除</button>
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
              if (confirm('您确定要 [ 删 除 ] 该分类么?')) {
                  var obj = $(this).parents('tr');
                  delAjax(ac_id, obj);// 执行删除操作
              }
          });

      });
    // 执行AJAX删除的操作
    function delAjax(id, obj) {
        $.ajax({
            type: 'get',
            url: "{{url('admin/del')}}/" + id,
            dateType: 'json',
            success: function (data) {

//                console.log(data);
                if (data.status) {
                   alert(data.ls);
                   obj.remove();
                } else {
                    alert(data.ls);
                }
            },
            error: function () {
                // AJAX执行失败
                alert('ajax操作失败');
            }
        });
    }
  </script>


