@extends('admin.index.index')
@section('link')
    <table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
        <p>您的位置：职位管理&nbsp;&nbsp;>&nbsp;&nbsp;职位添加</p>

        <div class="clearfix" style="margin-top:20px "></div>
        <tr>
            <td align="left" valign="top">
                <form method="post" action="{{url('/admin/role/save')}}" name="regiForm" onsubmit="return ckForm()" enctype="multipart/form-data">
                    {{  csrf_field() }}
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab" >
                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">职位：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="duty" class="text-word" onblur="ckUser()" value="{{$data->duty}}">
                            </td>
                            <td id="utab"></td>
                        </tr>
                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">描述:
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <textarea class="form-control text-word" rows="5" name="desc" style="width: 310px" onblur="ckPass()" value="">{{$data->desc}}</textarea>
                            </td>
                            <td id="ptab"></td>
                        </tr>
                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">
                                状态：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <select name="status">
                                    <option value="1" @if($data->status ==1) selected @else @endif>&nbsp;&nbsp;激活</option>
                                    <option value="2" @if($data->status ==2) selected @else @endif>&nbsp;&nbsp;禁用</option>
                                </select>
                            </td>
                        </tr>
                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">权限：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for" style="width: 500px !important;">
                            @foreach($data1 as $v)
                                <label>
                                    <input type="checkbox" value="{{$v->id}}" name="cid[]" @foreach($list as $k) @if($k->control_name == $v->control_name) checked @else @endif @endforeach>&nbsp;&nbsp;&nbsp;{{$v->control_name}}&nbsp;&nbsp;
                                </label>
                             @endforeach
                            </td>
                        </tr>
                        <tr >
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
        function ckUser(){
            var user = document.regiForm.duty.value;
            var utab = document.getElementById('utab');
            if (user.match(/^[\u4E00-\u9FA5A-Za-z]+$/) == null) {
                utab.innerHTML = '* 请不要输入数字和符号....';
                utab.style.color = '#FF0000';
                return false;
            } else{
                utab.innerHTML = '* 验证通过!';
                utab.style.color = '#00FF40';
                return true;
            }
        }

        function ckPass(){
            var poss = document.regiForm.desc.value;
            var ptab = document.getElementById('ptab');
            if (poss.match(/^[\u4E00-\u9FA5A-Za-z]+$/) == null) {
                ptab.innerHTML = '* * 请不要输入数字和符号....';
                ptab.style.color = '#FF0000';
                return false;
            } else{
                ptab.innerHTML = '* 验证通过!';
                ptab.style.color = '#00FF40';
                return true;
            }
        }
        function ckForm(){
            return  ckUser() && ckPass();
        }
    </script>
@endsection