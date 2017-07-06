@extends('admin.index.index')
@section('link')
    <table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
        <tr>
            <td width="99%" align="left" valign="top">您的位置：评分管理&nbsp;&nbsp;>&nbsp;&nbsp;评分详情</td>
        </tr>
        <tr>
            <td align="left" valign="top">
                <form method="get" action="{{url('Grade/Grade')}}" name="regiForm" enctype="multipart/form-data">
                    {{  csrf_field() }}
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">

                        @foreach ($data as $v)
                            <input type="hidden" name="id" value="{{$v->id}}">
                            <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                onMouseOver="this.style.backgroundColor='#edf5ff'">
                                <td align="right" valign="middle" class="borderright borderbottom bggray">书名:
                                </td>
                                <td align="left" valign="middle" class="borderright borderbottom main-for">
                                    <input type="text" name="domain" value="{{$v->bookname}}" class="text-word" onfocus=this.blur()>
                                </td>
                            </tr>
                            <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                onMouseOver="this.style.backgroundColor='#edf5ff'">
                                <td align="right" valign="middle" class="borderright borderbottom bggray">作者:
                                </td>
                                <td align="left" valign="middle" class="borderright borderbottom main-for">
                                    <input type="text" name="domain" value="{{$v->wirter}}" class="text-word" onfocus=this.blur()>
                                </td>
                            </tr>
                            <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                onMouseOver="this.style.backgroundColor='#edf5ff'">
                                <td align="right" valign="middle" class="borderright borderbottom bggray">评分分数:
                                </td>
                                <td align="left" valign="middle" class="borderright borderbottom main-for">
                                    <input type="text" name="domain" value="{{$score}}" class="text-word" onfocus=this.blur()>
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