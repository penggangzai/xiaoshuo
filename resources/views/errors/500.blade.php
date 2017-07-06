<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> - 500错误</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body class="gray-bg">


    <div class="middle-box text-center animated fadeInDown">
        <h1>500</h1>
        <h3 class="font-bold">服务器内部错误</h3>

        <div class="error-desc">
            服务器好像出错了...
            <br/>您可以返回主页看看
            <br/><a href="{{url('/')}}" class="btn btn-primary m-t">主页</a>
        </div>
    </div>

    <!-- 全局js -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    
    

</body>

</html>
