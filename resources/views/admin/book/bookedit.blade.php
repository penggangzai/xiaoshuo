@extends('admin.index.index')
@section('link')
    <table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
        <tr>
            <td width="99%" height="20" style="font-size: 20px" align="left" valign="top">您的位置 :分类管理&nbsp;&nbsp;>&nbsp;&nbsp;修改书籍</td>
        </tr>
        <tr>
            <td align="left" valign="top">
                <form method="post" action="{{url('admin/bookup')}}" enctype='multipart/form-data'>
                    {{  csrf_field() }}
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">书籍名：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="bookname" value="{{$data->bookname}}" class="text-word">
                            </td>
                        </tr>
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">作者：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="wirter" value="{{$data->wirter}}" class="text-word">
                            </td>
                        </tr>
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">
                                分类：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <select name="cid">
                                    @foreach($list as $v)
                                        {{$count = substr_count($v->path, ',').'<br>'}}
                                        {{$count = str_repeat('-----------', $count-1)}}
                                        <option value="{{$v->id}}"  {{($v->id === $data->cid)?'selected':''}}>{{$count.$v->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">
                                状态：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <select name="status">
                                    <option value="1" {{($data->status == '1')?'selected':''}}>&nbsp;&nbsp;连载</option>
                                    <option value="2" {{($data->status == '2')?'selected':''}}>&nbsp;&nbsp;完结</option>
                                </select>
                            </td>
                        </tr>


                        </tr>
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">
                                DisPlay：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <select name="display">
                                    <option value="1" {{($data->display == '1')?'selected':''}}>&nbsp;&nbsp;上架</option>
                                    <option value="2" {{($data->display == '2')?'selected':''}}>&nbsp;&nbsp;下架</option>
                                </select>
                            </td>
                        </tr>
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">简介:
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <textarea name="intro" cols="50" rows="2" style='vertical-align:top'
                                          class="text-word">{{$data->intro}}</textarea>
                            </td>
                        </tr>
                        {{--<tr onMouseOut="this.style.backgroundColor='#ffffff'"--}}
                            {{--onMouseOver="this.style.backgroundColor='#edf5ff'">--}}
                            {{--<td align="right" valign="middle" class="borderright borderbottom bggray">--}}
                                {{--图片：--}}
                            {{--</td>--}}
                            {{--<td align="left" valign="middle" class="borderright borderbottom main-for">                     <input type="file" name="img" value="" class="text-word">--}}

                            {{--</td>--}}
                        {{--</tr>--}}
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
