@extends('admin.index.index')
@section('link')
    <table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
        <tr>
            <td width="99%" align="left" valign="top">您的位置：用户列表&nbsp;&nbsp;>&nbsp;&nbsp;广告修改</td>
        </tr>
        <tr>
            <td align="left" valign="top">
                <form method="post" action="{{url('/poster/postermodify')}}" name="regiForm" onsubmit="return ckForm()" enctype="multipart/form-data">
                    {{  csrf_field() }}
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">

                        @foreach ($data as $v)
                            <input type="hidden" name="id" value="{{$v->id}}">
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">网站路径：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="domain" value="{{$v->domain}}" class="text-word" onblur="ckUser()">
                            </td>
                        </tr>
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">上传图片：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="file" name="img" value="" class="text-word">
                            </td>
                        </tr>
                        @endforeach
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">
                                &nbsp;</td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input name="" type="submit" value="提交" class="text-but">
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
@endsection