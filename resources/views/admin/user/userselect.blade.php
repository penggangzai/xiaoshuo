@extends('admin.index.index')
@section('link')
    <table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
        <tr>
            <td width="99%" align="left" valign="top">您的位置：用户列表&nbsp;&nbsp;>&nbsp;&nbsp;用户详情</td>
        </tr>
        <tr>
            <td align="left" valign="top">
                <form method="get" action="{{url('admin/user')}}" name="regiForm" enctype="multipart/form-data">
                    {{  csrf_field() }}
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">

                        @foreach ($data as $v)
                            <div class="circular">
                                @if($imgy)
                                    <img src="{{ url($imgy) }}">
                                @endif
                            </div>
                            <input type="hidden" name="id" value="{{$v->id}}">
                            <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                onMouseOver="this.style.backgroundColor='#edf5ff'">
                                <td align="right" valign="middle" class="borderright borderbottom bggray">手机号：
                                </td>
                                <td align="left" valign="middle" class="borderright borderbottom main-for">
                                    <input type="text" name="phone" value="{{$v->phone}}" class="text-word" onfocus=this.blur()>
                                </td>
                            </tr>
                            <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                onMouseOver="this.style.backgroundColor='#edf5ff'">
                                <td align="right" valign="middle" class="borderright borderbottom bggray">用户名:
                                </td>
                                <td align="left" valign="middle" class="borderright borderbottom main-for">
                                    <input type="text" name="email" value="{{$v->username}}" class="text-word" onfocus=this.blur()>
                                </td>
                            </tr>
                            <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                onMouseOver="this.style.backgroundColor='#edf5ff'">
                                <td align="right" valign="middle" class="borderright borderbottom bggray">邮箱:
                                </td>
                                <td align="left" valign="middle" class="borderright borderbottom main-for">
                                    <input type="text" name="email" value="{{$v->email}}" class="text-word" onfocus=this.blur()>
                                </td>
                            </tr>
                            <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                onMouseOver="this.style.backgroundColor='#edf5ff'">
                                <td align="right" valign="middle" class="borderright borderbottom bggray">创建时间:
                                </td>
                                <td align="left" valign="middle" class="borderright borderbottom main-for">
                                    <input type="text" name="email" value="{{$v->utime}}" class="text-word" onfocus=this.blur()>
                                </td>
                            </tr>
                            <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                onMouseOver="this.style.backgroundColor='#edf5ff'">
                                <td align="right" valign="middle" class="borderright borderbottom bggray">登录IP地址:
                                </td>
                                <td align="left" valign="middle" class="borderright borderbottom main-for">
                                    <input type="text" name="email" value="{{$v->loginip}}" class="text-word" onfocus=this.blur()>
                                </td>
                            </tr>
                            <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                onMouseOver="this.style.backgroundColor='#edf5ff'">
                                <td align="right" valign="middle" class="borderright borderbottom bggray">最后的登录时间:
                                </td>
                                <td align="left" valign="middle" class="borderright borderbottom main-for">
                                    <input type="text" name="email" value="{{$v->logintime}}" class="text-word" onfocus=this.blur()>
                                </td>
                            </tr>
                            <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                onMouseOver="this.style.backgroundColor='#edf5ff'">
                                <td align="right" valign="middle" class="borderright borderbottom bggray">用户剩余金币:
                                </td>
                                <td align="left" valign="middle" class="borderright borderbottom main-for">
                                    <input type="text" name="email" value="{{$v->old}}" class="text-word" onfocus=this.blur()>
                                </td>
                            </tr>
                            <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                onMouseOver="this.style.backgroundColor='#edf5ff'">
                                <td align="right" valign="middle" class="borderright borderbottom bggray">用户积分:
                                </td>
                                <td align="left" valign="middle" class="borderright borderbottom main-for">
                                    <input type="text" name="email" value="{{$v->integral}}" class="text-word" onfocus=this.blur()>
                                </td>
                            </tr>
                            <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                onMouseOver="this.style.backgroundColor='#edf5ff'">
                                <td align="right" valign="middle" class="borderright borderbottom bggray">
                                    性别：
                                </td>
                                <td align="left" valign="middle" class="borderright borderbottom main-for">
                                    @if ($v->sex == 1)
                                        <option value="1">&nbsp;&nbsp;男</option>
                                    @else
                                        <option value="2">&nbsp;&nbsp;女</option>
                                    @endif
                                </td>
                            </tr>
                            <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                onMouseOver="this.style.backgroundColor='#edf5ff'">
                                <td align="right" valign="middle" class="borderright borderbottom bggray">
                                    DisPlay：
                                </td>
                                <td align="left" valign="middle" class="borderright borderbottom main-for">
                                    @if ($v->status == 1)
                                        <option value="1">&nbsp;&nbsp;激活</option>
                                    @else
                                        <option value="2">&nbsp;&nbsp;禁用</option>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">
                                &nbsp;</td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input name="" type="submit" value="返回" class="text-but">
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
@endsection