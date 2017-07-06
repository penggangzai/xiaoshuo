@extends('admin.index.index')
@section('link')
    <p>您的位置：后台用户列表&nbsp;&nbsp;>&nbsp;&nbsp;用户添加</p>
    <table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
        <tr>
            <td align="left" valign="top">
                <form method="post" action="{{url('/admin/auser/insert')}}" name="regiForm"  enctype="multipart/form-data">
                    {{  csrf_field() }}
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">手机号：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="phone" value="" class="text-word" onblur="ckUser()" maxlength="11">
                            </td>
                            <td id="utab">* 必填项,输入手机号(11位手机号)</td>
                        </tr>
                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">密码:
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="password" name="pwd" value="" class="text-word" onblur="ckPass()">
                            </td>
                            <td id="ptab">* 必填项,输入开头字母大小写6-18位的密码</td>
                        </tr>
                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">确定密码:
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="password" name="repwd" value="" class="text-word" onblur="ckre()">
                            </td>
                            <td id="rtab">* 必填项,输入开头字母大小写6-18位的密码</td>
                        </tr>
                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">账号:
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="user" value="" class="text-word" onblur="ckEmail__()">
                            </td>
                            <td id="etab">* 必填项,字母开头，允许字母数字下划线</td>
                        </tr>
                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">
                                职业：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                @foreach($data as $v)
                                <label>
                                    <input type="checkbox" value="{{$v->id}}" name="id[]">&nbsp;&nbsp;{{$v->duty}}&nbsp;&nbsp;&nbsp;
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
                                    <option value="1" selected>&nbsp;&nbsp;激活</option>
                                    <option value="2">&nbsp;&nbsp;禁用</option>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr >
                            <td align="right" valign="middle" class="borderright borderbottom bggray">上传图片：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="file" name="img" value="" class="text-word">
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

        function ckPass(){
            var poss = document.regiForm.pwd.value;
            var ptab = document.getElementById('ptab');
            if (poss.match(/^[a-zA-Z]\w{5,17}$/) == null) {
                ptab.innerHTML = '* 密码长度不合法!';
                ptab.style.color = '#FF0000';
                return false;
            } else{
                ptab.innerHTML = '* 验证通过!';
                ptab.style.color = '#00FF40';
                return true;
            }
        }

        function ckre(){
            var poss = document.regiForm.pwd.value;
            var rep = document.regiForm.repwd.value;
            console.log(poss,rep);
            var rtab = document.getElementById('rtab');
            if (poss !== rep) {
                rtab.innerHTML = '* 俩次密码不一致';
                rtab.style.color = '#FF0000';
                return false;
            } else{
                rtab.innerHTML = '* 验证通过!';
                rtab.style.color = '#00FF40';
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
//            console.log(email);
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

@endsection