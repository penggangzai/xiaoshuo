@extends('admin.index.index')
@section('link')
    <div class="container-fulid col-md-10 add">
        <h3><span class="glyphicon glyphicon-list"></span>背景音乐管理</h3>
        <table class="table table-bordered table-hover table-striped">
            <tr class="info">
                <th class="col-md-1">编号(ID)</th>
                <th class="col-md-2">歌曲名</th>
                <th class="col-md-1">DISPLAY</th>
                <th class="col-md-1">FACE(封面)</th>
                <th class="col-md-1">添加时间</th>
                <th class="col-md-1">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                        添加
                    </button>
                </th>
            </tr>
            @foreach($list as $v)
                <tr class="danger">
                    <td>{{$v->id}}</td>
                    <td>{{$v->name}}</td>
                    <td><a href="{{url('admin/mpdisplay')}}/{{$v->id}}/{{$v->display}}" class="btn-primary btn-sm"
                           style="color: #FFF0F0">
                            {{($v->display)==1?'显示':'隐藏'}}
                        </a></td>
                    <td><a href="{{url('admin/mpface')}}/{{$v->id}}/{{$v->face}}" class="btn-primary btn-sm"
                           style="color: #FFF0F0">
                            {{($v->face)==1?'上线':'下线'}}
                        </a></td>
                    <td>{{$v->time}}</td>
                    <td>
                        <button class="btn btn-danger btn-sm del" data-id="{{$v->id}}">删除</button>
                    </td>
                </tr>
            @endforeach

        </table>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                        <table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
                            <tr>
                                <td width="99%" height="20" style="font-size: 20px" align="left" valign="top">您的位置
                                    :背景音乐管理&nbsp;&nbsp;>&nbsp;&nbsp;添加音乐
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">
                                    <form method="post" action="{{url('admin/mpadd')}}" enctype='multipart/form-data'>
                                        {{  csrf_field() }}
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
                                            <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                                onMouseOver="this.style.backgroundColor='#edf5ff'">
                                                <td align="right" valign="middle"
                                                    class="borderright borderbottom bggray">歌曲名：
                                                </td>
                                                <td align="left" valign="middle"
                                                    class="borderright borderbottom main-for">
                                                    <input type="text" name="name" value="" class="text-word"
                                                           style="width: 268px">
                                                </td>
                                            </tr>
                                            <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                                onMouseOver="this.style.backgroundColor='#edf5ff'">
                                                <td align="right" valign="middle"
                                                    class="borderright borderbottom bggray">URL地址:
                                                </td>
                                                <td align="left" valign="middle"
                                                    class="borderright borderbottom main-for">
                                <textarea name="url" cols="50" rows="2" style='vertical-align:top'
                                          class="text-word"></textarea>
                                                </td>
                                            </tr>
                                            <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                                onMouseOver="this.style.backgroundColor='#edf5ff'">
                                                <td align="right" valign="middle"
                                                    class="borderright borderbottom bggray">
                                                    &nbsp;</td>
                                                <td align="left" valign="middle"
                                                    class="borderright borderbottom main-for">
                                                    <input class="btn btn-danger btn-lg" name="" type="submit"
                                                           value="提交" class="text-but" style="margin-right: 128px">
                                                    <input class="btn btn-danger btn-lg" name="" type="reset" value="重置"
                                                           class="text-but"></td>
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
                    url: "{{url('admin/mpdel')}}/" + id,
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


