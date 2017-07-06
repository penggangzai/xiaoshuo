@extends('admin.index.index')
@section('link')
    <table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
        <p>您的位置：权限管理&nbsp;&nbsp;>&nbsp;&nbsp;权限添加</p>

        <div class="clearfix" style="margin-top:20px "></div>
        <tr>
            <td align="left" valign="top">
                <form method="post" action="{{url('/admin/control/insert')}}"  enctype="multipart/form-data">
                    {{  csrf_field() }}
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab" >
                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">权限名称：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="control_name" class="text-word" onblur="ckUser()" value="{{old('control_name')}}">
                            </td>
                            <td id="utab"></td>
                        </tr>
                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">控制器：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="control" class="text-word"  value="{{old('control')}}">
                            </td>
                            <td id="utab"></td>
                        </tr>
                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">方法：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="func" class="text-word"  value="{{old('func')}}">
                            </td>
                            <td id="utab"></td>
                        </tr>
                        <tr>
                            <td align="right" valign="middle" class="borderright borderbottom bggray">
                                &nbsp;</td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input name="" type="submit" value="提交" class=" btn btn-primary btn-lg">
                                <input name="" type="reset" value="重置" class="btn btn-danger btn-lg"></td>
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