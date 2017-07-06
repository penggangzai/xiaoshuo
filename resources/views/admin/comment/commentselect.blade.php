@extends('admin.index.index')
@section('link')
    <table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
        <tr>
            <td width="99%" align="left" valign="top">您的位置：评论列表&nbsp;&nbsp;>&nbsp;&nbsp;评论详情</td>
        </tr>
        <tr>
            <td align="left" valign="top">
                <form method="get" action="{{url('comment/comment')}}" name="regiForm" enctype="multipart/form-data">
                    {{  csrf_field() }}
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">

                        @foreach ($data as $v)
                            <input type="hidden" name="id" value="{{$v->id}}">
                            <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                onMouseOver="this.style.backgroundColor='#edf5ff'">
                                <td align="right" valign="middle" class="borderright borderbottom bggray">点赞数量:
                                </td>
                                <td align="left" valign="middle" class="borderright borderbottom main-for">
                                    <input type="text" name="email" value="{{$v->agree}}" class="text-word" onfocus=this.blur()>
                                </td>
                            </tr>
                            <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                                onMouseOver="this.style.backgroundColor='#edf5ff'">
                                <td align="right" valign="middle" class="borderright borderbottom bggray">评论内容:
                                </td>
                                <td align="left" valign="middle" class="borderright borderbottom main-for">
                                    {{$v->comment}}
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