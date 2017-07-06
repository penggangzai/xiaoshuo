@extends('home.member.index')
@section('link')
    @parent
    <link rel="stylesheet" href="{{asset('home/member/css/member.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dist/amazeui.min.css')}}" />
    <style type="text/css">
        #clip {
            width: 30%;
            height: 200px;
        }
    </style>

@endsection
@section('contant')
    <div class="mian">
        <p><a href="{{url('member/index')}}">首页</a> > 个人信息</p>

                <ul id="user_nva" class="clearfix">
                    <li>
                            基本设置
                    </li>
                    <li>
                            头像设置
                    </li>
                    <li>
                            密码设置
                    </li>
                </ul>

            <div class="clearfix" style="margin-top:20px"></div>
            <div class="container">
                <ul id="user_info">
                    <li>
                        <form id ='my' name="my" onsubmit="return false">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$_SESSION['home']['id']}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">name </label>
                                <input type="text" class="form-control width" id="exampleInputEmail1" placeholder="name" name="username" onblur="user_name()"  value = '{{$list->username}}'>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email </label>
                                <input type="email" class="form-control width" id="exampleInputEmail1" placeholder="Email" name="email" onblur="emailname()" value = '{{$list->email}}'>
                            </div>
                            <div class="row " style="margin:20px 0 ">
                                <div class="col-md-1" >
                                    性别:
                                </div>
                                <div class="col-md-1">
                                    <input type="radio" name="sex" value="1" @if($list->sex == 1 ) checked @else @endif>&nbsp;&nbsp;&nbsp;男
                                </div>
                                <div class="col-md-1">
                                    <input type="radio" name="sex" value="2" @if($list->sex == 2 ) checked @else @endif>&nbsp;&nbsp;&nbsp;女
                                </div>
                                <div class="col-md-9"></div>
                            </div>
                            <button type="submit" class="btn btn-default bti">保存</button>

                        </form>


                    </li>
                    <li style="display: none">
                        @if(empty($list->icon))
                        <img class="am-img-circle" id="img-view" src="{{asset('images/4.jpg')}}" width="100" height="100"/>
                        @else
                            <img class="am-img-circle" id="img-view" src="{{$list->icon}}" width="100" height="100"/>
                        @endif
                        <br><br>
                        <form action="{{url('member/img')}}" method="post" id="myform">
                            {{ csrf_field() }}
                            <input type="hidden" name="icon" value="" class="myimg">
                            <input type="hidden" name="id" value="{{$_SESSION['home']['id']}}" >
                        </form>
                        <div id="clip"></div>
                            <div class="am-margin-sm">
                                <button type="button" class="am-btn am-btn-primary" id="toggle-file">上传头像</button>
                                <button type="button" class="am-btn am-btn-primary" id="clipBtn">裁剪</button>
                                <button type="button" class="am-btn am-btn-primary heh" >更换</button>
                            </div>
                            <input class="am-hide" type="file" id="file" name="icon">
                    </li>
                    <li style="display: none">
                        <form action="{{url('member/pwd')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name = 'id' VALUE="{{$_SESSION['home']['id']}}" class="can">
                            <div class="form-group">
                                <label for="exampleInputEmail1">新密码 </label>
                                <input type="password" class="form-control width" id="exampleInputEmail1" placeholder="password" name="pwd">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">确认密码</label>
                                <input type="password" class="form-control width" id="exampleInputPassword1" placeholder="truepwd" name="repwd">
                            </div>
                            <div class="form-group code1">
                                <label for="exampleInputPassword1">验证码</label>
                                <input type="password" class="form-control width" id="exampleInputPassword1" placeholder="code" name="code" style="width: 375px !important;">
                                <span  class="btn btn-primary code zz" id="as">获取手机验证码</span><span id="asd" class="btn btn-primary zz" style="display: none"></span>
                            </div>

                            <button type="submit" class="btn btn-default btn-lg">保存</button>
                        </form>

                    </li>
                </ul>
            </div>
    </div>
@endsection
@section('script')
    @parent
    <script>
        $('#user_nva li').mousemove(function () {
            $(this).css('color','#000');
        });
        var user_nva = document.getElementById('user_nva').getElementsByTagName('li');
        var user_info = document.getElementById('user_info').getElementsByTagName('li');
        //闭包模式
        for(var i = 0;i<user_nva.length;i++ ){
            (function (i) {
                user_nva[i].onclick = function () {
                    for(var j = 0;j<user_nva.length;j++ ){
                        user_nva[j].style.border = 'none';
                        user_nva[j].style.color = '#B4B48B';
                    }
                    user_nva[i].style.border = '2px solid #ccc';
                    user_nva[i].style.color = '#000';
                    for(var k = 0;k<user_nva.length;k++ ){
                        user_info[k].style.display = 'none';
                    }
                    user_info[i].style.display = 'block';
                }
            })(i)

        }

        //静态修改信息
        $('.bti').click(function () {
            var info = $('#my input').serialize();
            //console.log(info);
            $.ajax({
                type:'post',
                url:"{{url('member/save')}}",
                data:info,
                dataType:'json',
                success:function (data) {
                    console.log(data);
//
                    if (data.status) {
                        alert(data.info);
                    } else {
                        alert(data.info);
                    }
                },
                error:function () {
                    alert('AJAX请求失败');
                }
            });
        });
        //失交事件
        function emailname() {
            var email = document.my.email.value;
            if (email.search(/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
                ) === -1) {
                alert('邮箱格式不正确!');
            }

        }
        function user_name() {
            var name = document.my.username.value;
            if (name.search(/^[\u4E00-\u9FA5A-Za-z0-9_]{1,15}$/
                ) === -1) {
                alert('只允许汉字,数子,英文,下划线组成字符串不得超过15位');
            }
        }

        $('#as').click(function () {
            var id = $('.can').attr('value');
            $.ajax({
               type:'get',
                url:'{{asset("member/phone")}}/'+id,
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    if (data ==0) {
                        alert('发送失败,请稍后再试试');
                    }else {
                        alert('已发送');
                    m = 120;
                    setInterval('start()', 500)
                    }
                    
                },
                error:function () {
                    console.log(3456780);
                     alert('发送失败,请稍后再试试');
                   
                },
            });
        });
        function start(){
            // 找对象 概属性
            m--;
            $('#asd').html(m+'秒后重新发送');
            $('#asd').css('display','block');
            $('#as').css('display','none');

            //判断是否为0
            if (m <= 0) {
                $('#as').css('display','block');
                $('#asd').css('display','none');
                // 清除定时
                clearInterval(timer);
            }
        }
    </script>
    <script src="{{asset('dist/iscroll-zoom.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('dist/hammer.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('dist/photoClip.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script>
        $(function() {
            var $clip = $("#clip");
            var $file = $("#file");
            $("#toggle-file").click(function() {
                $file.trigger("click");
            });
            $clip.photoClip({
                width: 100,
                height: 100,
                fileMinSize: 20,
                file: $file,
                defaultImg: "../images/4.jpg",
                ok: "#clipBtn",
                loadStart: function() {
                    console.log("照片读取中");
                },
                loadProgress: function(progress) {
                    console.log(progress);
                },
                loadError: function() {
                    console.log("图片加载失败");
                },
                loadComplete: function() {
                    console.log("照片读取完成");
                },
                imgSizeMin: function(kbs) {
                    console.log(kbs, "上传图片过小");
                },
                clipFinish: function(dataURL) {
                    document.getElementById("img-view").src = dataURL;
                }
            });
        })
    </script>
    <script>
        $('.heh').click(function () {
           var img =  $('#img-view').attr('src');
//           console.log(img);
            if(!img) {
                alert('请剪切图片');
                return;
            }
            $('.myimg').attr('value',img);
//            console.log($('.myimg').attr('value'));
            console.log($('#myform'));
            $('#myform').submit();
        });

    </script>
@endsection