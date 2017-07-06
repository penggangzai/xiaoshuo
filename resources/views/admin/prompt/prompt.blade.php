<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>提示</title>
    <link rel="stylesheet" href="{{url('/css/app.css')}}">
    <style>
        body{
            background: #ccc;
        }
        .wrapper-page{
            margin: 0 auto;
            /*background: #ccc;*/
            height: 540px;
            width: 100%;
            position: relative;
            /* background-image: url('/admin/images/propmt/ts.jpg'); */
            
        }
        .con{
            width: 500px;
            height: 300px; 
            background: #fff;
            position: absolute;
            left: 400px;
            top: 80px;
            text-align: center;
        }
        h2{
            font-size: 30px;
        }
        .input-group{
            margin-top: 60px;
        }
    </style>
</head>
<body>
    <div class="wrapper-page">
        <div class="con">
            <div class="panel panel-color {{ $data['status']?'panel-inverse':'panel-danger' }}">

                <div class="panel-heading">
                   <h2 class="text-center m-t-10">{{ $data['message'] }}</h2>
                </div>

                <div class="panel-body">
                    <div class="text-center">
                        <div class="alert {{ $data['status']?'alert-info':'alert-danger' }} alert-dismissable">
                            浏览器页面将在<b id="loginTime">{{ $data['jumpTime'] }}</b>秒后跳转......
                        </div>
                        <div class="form-group m-b-0">
                            <div class="input-group">
                               <button type="" class="btn-success btn btn-primary btn-sm"">点击立即跳转</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
        <script src="{{url('/js/app.js')}}"></script>
        <script type="text/javascript">
            $(function(){
                //循环倒计时，并跳转
                var url = "{{ $data['url'] }}";
                var loginTime = parseInt($('#loginTime').text());
                console.log(loginTime);
                var time = setInterval(function(){
                    loginTime = loginTime-1;
                    $('#loginTime').text(loginTime);
                    if(loginTime==0){
                        clearInterval(time);
                        window.location.href=url;
                    }
                },1000);
            })
//点击跳转
            $('.btn-success').click(function () {
                var url = "{{ $data['url'] }}";
                window.location.href=url;
            })
        </script>
    </body>

</html>
