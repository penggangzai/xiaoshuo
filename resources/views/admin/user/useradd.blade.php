@extends('admin.index.index')
@section('link')
    <table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
        <tr>
            <td width="99%" align="left" valign="top">您的位置：用户列表&nbsp;&nbsp;>&nbsp;&nbsp;用户添加</td>
        </tr>
        <tr>
            <td align="left" valign="top">
                <form method="post" action="{{url('/admin/useraddx')}}" name="regiForm" onsubmit="return ckForm()" enctype="multipart/form-data">
                    {{  csrf_field() }}
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">手机号：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="phone" value="" class="text-word" onblur="ckUser()">
                            </td>
                            <td id="utab">* 必填项,输入手机号(11位手机号)</td>
                        </tr>
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">密码:
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="password" name="pwd" value="" class="text-word" onblur="ckPass()">
                            </td>
                            <td id="ptab">* 必填项,输入开头字母大小写6-18位的密码</td>
                        </tr>
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">邮箱:
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="email" value="" class="text-word" onblur="ckEmail()">
                            </td>
                            <td id="etab">* 必填项,输入常用邮箱</td>
                        </tr>
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">
                                性别：
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <select name="sex">
                                    <option value="1" selected>&nbsp;&nbsp;男</option>
                                    <option value="2">&nbsp;&nbsp;女</option>
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
                                    <option value="1" selected>&nbsp;&nbsp;激活</option>
                                    <option value="2">&nbsp;&nbsp;禁用</option>
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
    @if(!empty(session('error')))
        <script>
            alert('{{session('error')}}');
        </script>
    @endif
    <script>
        function ckUser(){
            var user = document.regiForm.phone.value;
            var utab = document.getElementById('utab');
            if (user.match(/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/) == null) {
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

        function ckEmail(){
            var email = document.regiForm.email.value;
            var etab = document.getElementById('etab');
            if (email.match(/^[\w-]+@[\w-]+(\.\w+){1,3}$/) == null) {
                etab.innerHTML = '* 邮箱格式不正确!';
                etab.style.color = '#FF0000';
                return false;
            } else{
                etab.innerHTML = '* 验证通过!';
                etab.style.color = '#00FF40';
                return true;
            }
        }

        function ckForm(){
            return ckEmail() && ckUser() && ckPass();
        }
    </script>
@endsection