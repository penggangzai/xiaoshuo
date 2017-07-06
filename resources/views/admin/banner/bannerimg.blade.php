@extends('admin.index.index')
@section('link')
    <div class="container-fulid col-md-11">
        <td width="99%" height="20" style="font-size: 20px" align="left" valign="top">您的位置 :分类管理&nbsp;&nbsp;>&nbsp;&nbsp;添加轮播图</td>

    <table  class="table table-bordered table-hover table-striped">

        <tr class="info">
            <th class="col-md-1">编号(ID)</th>
            <th class="col-md-2">NAME</th>
            <th class="col-md-3">图片</th>
            <th class="col-md-2">

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                    添加
                </button>
            </th>
        </tr>
        @foreach ($list as $v)
            <tr class="danger">
                <td>{{$v->id}}</td>
                <td>{{$v->bookname}}</td>
                <td><img src="{{asset($v->url)}}" alt="" height="80"></td>
                <td>
                    <button class="btn btn-danger btn-sm del" data-id="{{$v->id}}">删除</button>
                </td>
            </tr>
        @endforeach
    </table>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">

                        <tr>
                            <td align="left" valign="top">
                                <form method="post" action="{{url('admin/biadd')}}" enctype='multipart/form-data'>
                                    {{  csrf_field() }}
                                    <input type="hidden" name="brid" value="{{$id}}">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
                                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                                            <td align="right" valign="middle" class="borderright borderbottom bggray">请输入书名添加：
                                            </td>
                                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                                <input type="text" name="bookname" value="" class="text-word">
                                            </td>
                                        </tr>

                                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                                            <td align="right" valign="middle" class="borderright borderbottom bggray">
                                                &nbsp;</td>
                                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                                <input name="" type="submit" value="提交" class="text-but">
                                                <input name="" type="reset" value="重置" class="text-but"></td>
                                        </tr>
                                    </table>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


























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
            url: "{{url('admin/bannerdel')}}/" + id,
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