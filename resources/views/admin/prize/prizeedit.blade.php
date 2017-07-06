@extends('admin.index.index')
@section('link')
    <table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
        <tr>
            <td width="99%" height="20" style="font-size: 20px" align="left" valign="top">您的位置 :奖品管理&nbsp;&nbsp;>&nbsp;&nbsp;编辑奖品</td>
        </tr>
        <tr>
            <td align="left" valign="top">
                <form method="post" action="{{url('admin/prize/save')}}" enctype='multipart/form-data'>
                    {{  csrf_field() }}
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
                        <tr>
                            <td align="right" valign="middle" class="borderright borderbottom bggray">名称：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="goodname" value="{{$data->goodname}}" class="text-word">
                            </td>
                        </tr>
                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">积分：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="price"  class="text-word" value="{{$data->price}}">
                            </td>
                        </tr>

                        <tr>
                            <td align="right" valign="middle" class="borderright borderbottom bggray">
                                状态：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <select name="status">
                                    <option value="1" @if($data->status ==1) checked @else @endif>&nbsp;&nbsp;上架</option>
                                    <option value="2" @if($data->status ==2) checked @else @endif>&nbsp;&nbsp;下架</option>
                                </select>
                            </td>
                        </tr>


                        </tr>

                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">简介:
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <textarea name="intro" cols="50" rows="2" style='vertical-align:top'
                                          class="text-word">{{$data->intro}}</textarea>
                            </td>
                        </tr>

                        <tr >
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
    <script>
        $('#main-tab tr').mouseover(function () {
            $(this).css('background','#edf5ff') ;
        });
        $('#main-tab tr').mouseout(function () {
            $(this).css('background','#fff') ;
        });
    </script>
@endsection
