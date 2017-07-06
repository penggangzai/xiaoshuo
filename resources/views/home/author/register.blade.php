
<!DOCTYPE html>
<html lang="en-us" id="extr-page">
<head>
    <meta charset="utf-8">
    <title>帐号注册-爱阅读作家专区</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/smartadmin-production-plugins.min.css')}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/smartadmin-production.min.css')}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/smartadmin-skins.min.css')}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/smartadmin-rtl.min.css')}}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!--[if lt IE 9]>
    <script src="{{asset('js/html5shiv.min.js')}}"></script>
    <script src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body id="login">
<header id="header">
    <div id="logo-group">
        <span><a href="{{url('/')}}"> <img src="{{asset('images/123.png')}}" alt="codepay" width="80px" height="80px"></a></span>    </div>
    <span id="extr-page-header-space"> <a href="{{url('home/author/login')}}" class="btn btn-danger">立即登录</a> </span>
</header>
<div id="main" role="main">
    <div id="content" class="container">
        
        <div class="row">
            <div class="col-md-3 col-lg-3">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="well no-padding">

                        <form action="{{url('home/author/addrig')}}" method="post" name="regiForm" id="smart-form-register" class="smart-form client-form">
                            {{  csrf_field() }}
                            <input type="hidden" name="status" value="1">
                            <input type="hidden" name="utime" value="{{time()}}">
                        <header>
                            用户注册
                        </header>
                        <fieldset>

                            <section>
                                <label class="label">电话</label>

                                <label class="input"> 
                                    <input type="text" placeholder="电话" maxlength="11" name="phone" onblur="user_()">
                                    <b class="tooltip tooltip-bottom-right" id="utab">请输入您的电话</b> </label>
                            </section>


                            <section>
                                <label class="label">密码</label>

                                <label class="input"> 
                                    <input type="password" placeholder="密码"  onblur="ckPass()" name="pwd" id="password">
                                    <b class="tooltip tooltip-bottom-right" id="ptab">请输入您要设定的密码</b>
                                </label>
                            </section>

                            <section>
                                <label class="label">密码重复</label>

                                <label class="input"> 
                                    <input type="password"  name="repwd" onblur="ckre()" placeholder="再次输入密码">
                                    <b class="tooltip tooltip-bottom-right" id="rtab">请确认您设定的密码</b> </label>
                            </section>

                            <section>
                                <label class="label">笔名</label>

                                <label class="input">
                                    <input type="text" placeholder="笔名"  onblur="ckEmail__()" name="autorname">
                                    <b class="tooltip tooltip-bottom-right">请输入你的笔名</b> </label>
                            </section>
                            <section>
                                <select class="form-control" name="sex">
                                    <option value="1">男</option>
                                    <option value="2">女</option>
                                </select>
                            </section>

                            <section>
                                <label class="label">邮箱</label>

                                <label class="input"> 
                                    <input type="email" name="email" placeholder="邮箱地址（将用于找回密码）" onblur="ckEmail()" >
                                    <b class="tooltip tooltip-bottom-right">请输入您常用的邮箱</b> </label>
                            </section>

                        </fieldset>

                        <footer>
                            <button type="submit" class="btn btn-primary">
                                注册
                            </button>
                        </footer>
                        <div class="message">
                            <i class="fa fa-check"></i>
                            <p>
                                感谢您的加入！
                            </p>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery-1.10.2.min.js')}}" type="text/javascript"></script>

<script src="{{asset('js/jquery-ui-1.10.3.min.js')}}"></script>
<script src="{{asset('js/app.config.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/jquery.maskedinput.min.js')}}"></script>
<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->
@if(!empty(session('error')))
    <script>
        alert('{{session('error')}}')
    </script>
@endif
<script src="{{asset('js/app.min.js')}}"></script>
<script type="text/javascript">
    runAllForms();

    // Model i agree button
    $("#i-agree").click(function () {
        $this = $("#terms");
        if ($this.checked) {
            $('#myModal').modal('toggle');
        } else {
            $this.prop('checked', true);
            $('#myModal').modal('toggle');
        }
    });

    // Validation
    $(function () {
        // Validation
        $("#smart-form-register").validate({

            // Rules for form validation
            rules: {
                username: {
                    required: true
//                },
//                email : {
//                    required : true,
//                    email : true
                },
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 20
                },
                password2: {
                    required: true,
                    minlength: 6,
                    maxlength: 20,
                    equalTo: '#password'
                }
            },

            // Messages for form validation
            messages: {
                username: {
                    required: '请输入您的用户名'
                },
                email: {
                    required: '请输入您常用的邮箱',
                    email: '请输入正确的邮箱地址'
                },
                password: {
                    required: '请输入您要设定的密码',
                    minlength: '请输入6-20位的密码',
                },
                password2: {
                    required: '请确认您设定的密码',
                    minlength: '请输入6-20位的密码',
                    equalTo: '您两次输入的密码不相符'
                }
            },
            // Do not change code below
            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            }
        });

    });

</script>

</body>
</html>