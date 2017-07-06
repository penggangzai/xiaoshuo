@extends('admin.index.index')
@section('link')
    <p>您的位置：权限列表&nbsp;&nbsp;>&nbsp;&nbsp;权限修改</p>
    <table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
        <tr>
            <td align="left" valign="top">
                <form method="post" action="{{url('/admin/control/save')}}"  enctype="multipart/form-data">
                    {{  csrf_field() }}
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
                            <input type="hidden" name="id" value="{{$data->id}}">
                        <tr>
                            <td align="right" valign="middle" class="borderright borderbottom bggray">权限名称：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="control_name" value="{{$data->control_name}}" class="text-word" >
                            </td>
                        </tr>
                        <tr>
                            <td align="right" valign="middle" class="borderright borderbottom bggray">控制器:
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="control" value="{{$data->control}}" class="text-word" >
                            </td>
                        </tr>
                        <tr>
                            <td align="right" valign="middle" class="borderright borderbottom bggray">
                                方法：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="func" value="{{$data->func}}" class="text-word" >

                            </td>
                        </tr>

                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">
                                &nbsp;</td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input name="" type="submit" value="保存" class="btn-primary btn-lg btn">
                                <input name="" type="reset" value="重置" class=" btn-danger btn-lg btn"></td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
    <script>
        $('#main-tab tr').mouseover(function () {
            $(this).css('background','#edf5ff') ;
        });
        $('#main-tab tr').mouseout(function () {
            $(this).css('background','#fff') ;
        });

    </script>
@endsection