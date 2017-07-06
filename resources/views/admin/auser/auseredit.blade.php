@extends('admin.index.index')
@section('link')
    <p>您的位置：后台用户列表&nbsp;&nbsp;>&nbsp;&nbsp;用户编辑</p>
    <table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
        <tr>
            <td align="left" valign="top">
                <form method="post" action="{{url('/admin/auser/save')}}" name="regiForm"  enctype="multipart/form-data">
                    {{  csrf_field() }}
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">手机号：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="phone" value="{{$data->phone}}" class="text-word" onblur="ckUser()">
                            </td>
                            <td id="utab">* 必填项,输入手机号(11位手机号)</td>
                        </tr>

                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">账号:
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="user" value="{{$data->user}}" class="text-word" onblur="ckEmail__()" readonly>
                            </td>
                        </tr>
                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">
                                职业：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                @foreach($data1 as $v)
                                    <label>
                                        <input type="checkbox" value="{{$v->id}}" @foreach($list as $k)@if($k->duty == $v->duty)checked @else @endif @endforeach name="rid[]">&nbsp;&nbsp;{{$v->duty}}&nbsp;&nbsp;&nbsp;
                                    </label>
                                @endforeach
                            </td>
                            <td>*必须填写</td>
                        </tr>
                        <tr>
                            <td align="right" valign="middle" class="borderright borderbottom bggray">
                                状态：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <select name="status">
                                    <option value="1" @if($data->status ==1)selected@else @endif>&nbsp;&nbsp;激活</option>
                                    <option value="2" @if($data->status ==2)selected@else @endif>&nbsp;&nbsp;禁用</option>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">
                                &nbsp;</td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input  type="submit" value="提交" class=" btn-primary btn-lg">
                                <input  type="reset" value="重置" class=" btn-danger btn-lg">
                            </td>
                            <td></td>
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
            var user = document.regiForm.phone.value;
            var utab = document.getElementById('utab');
            if (user.match(/^1(3|4|5|7|8)\d{9}$/) == null) {
                utab.innerHTML = '* 手机号格式不正确....';
                utab.style.color = '#FF0000';
                return false;
            } else{
                utab.innerHTML = '* 验证通过!';
                utab.style.color = '#00FF40';
                return true;
            }
        }


        function ckEmail__(){
            var email = document.regiForm.user.value;
            var etab = document.getElementById('etab');
            if (email.match(/^[a-zA-Z][a-zA-Z0-9_]{4,15}$/) == null) {
                etab.innerHTML = '* 账号格式不正确';
                etab.style.color = '#FF0000';
                return false;
            }

            $.ajax({
                type:'get',
                url:'{{url('admin/auser/check')}}/'+email,
                dataType:'json',
                success:function (data) {
                    if(data.status){
                        etab.innerHTML = '* 验证通过!';
                        etab.style.color = '#00FF40';
                        return true;

                    } else {
                        etab.innerHTML = '* 账号已经存在';
                        etab.style.color = '#FF0000';
                        return false;
                    }
                },
                error:function () {
                    alert('AJAX请求失败');
                }
            });

        }

    </script>
    @if(!empty(session('error')))
        <script>
            alert('{{session('error')}}')
        </script>
    @endif
@endsection