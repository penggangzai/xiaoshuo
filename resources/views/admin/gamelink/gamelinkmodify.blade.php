@extends('admin.index.index')
@section('link')
    <table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
        <tr>
            <td width="99%" align="left" valign="top">您的位置：游戏链接列表&nbsp;&nbsp;>&nbsp;&nbsp;游戏链接修改</td>
        </tr>
        <tr>
            <td align="left" valign="top">
                <form method="post" action="{{url('/gamelink/gamelinkmodify')}}" name="regiForm" onsubmit="return ckForm()" enctype="multipart/form-data">
                    {{  csrf_field() }}
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">

                        @foreach ($data as $v)
                            <input type="hidden" name="id" value="{{$v->id}}">
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">游戏链接名字：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="name" value="{{$v->name}}" class="text-word" onblur="ckUser()">
                            </td>
                        </tr>
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">链接地址:
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="domain" value="{{$v->domain}}" class="text-word" onblur="ckPass()">
                            </td>
                        </tr>
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">
                                DisPlay：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <select name="status">
                                    <option value="1" @if ($v->status == 1) selected @endif>&nbsp;&nbsp;激活</option>
                                    <option value="2" @if ($v->status == 2) selected @endif>&nbsp;&nbsp;禁用</option>
                                </select>
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
                                <input name="" type="submit" value="修改" class="text-but">
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
@endsection