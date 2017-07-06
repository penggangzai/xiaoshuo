@extends('admin.index.index')
@section('link')
    <table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
        <tr>
            <td width="99%" height="20" style="font-size: 20px" align="left" valign="top">您的位置 :精品推荐管理&nbsp;&nbsp;>&nbsp;&nbsp;添加推荐</td>
        </tr>
        <tr>
            <td align="left" valign="top">
                <form method="post" action="{{url('admin/groadd')}}" enctype='multipart/form-data'>
                    {{  csrf_field() }}
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">推荐编号：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="gname" value="" class="text-word">
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
@endsection
