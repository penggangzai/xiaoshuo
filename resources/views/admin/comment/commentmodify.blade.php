@extends('admin.index.index')
@section('link')
    <table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
        <tr>
            <td width="99%" align="left" valign="top">您的位置：用户列表&nbsp;&nbsp;>&nbsp;&nbsp;用户修改</td>
        </tr>
        <tr>
            <td align="left" valign="top">
                <form method="post" action="{{url('/comment/commentmodify')}}" name="regiForm" onsubmit="return ckForm()" enctype="multipart/form-data">
                    {{  csrf_field() }}
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">

                        @foreach ($data as $v)
                            <input type="hidden" name="id" value="{{$v->id}}">
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">点赞量:
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="agree" value="{{$v->agree}}" class="text-word" onblur="ckPass()">
                            </td>
                        </tr>
                        <tr onMouseOut="this.style.backgroundColor='#ffffff'"
                            onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="right" valign="middle" class="borderright borderbottom bggray">评论内容:
                            </td>
                            <td align="left" valign="middle" class="borderright borderbottom main-for">
                                <input type="text" name="comment" value="{{$v->comment}}" class="text-word" onblur="ckPass()">
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
    <script>
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
            return ckEmail() && ckUser();
        }
    </script>
@endsection