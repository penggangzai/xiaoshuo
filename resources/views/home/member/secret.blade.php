@extends('home.member.index')
@section('link')
    @parent
    <link rel="stylesheet" href="{{asset('home/member/css/member.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dist/amazeui.min.css')}}" />
    <style type="text/css">
        #clip {
            width: 20%;
            height: 200px;
        }
    </style>


@endsection
@section('contant')
    <div class="mian">
        <p><a href="{{url('member/index')}}">首页</a> > 密保信息</p>

                <ul id="user_nva" class="clearfix">
                    <li>
                            密保设置
                    </li>
                </ul>

            <div class="clearfix" style="margin-top:20px"></div>
            <div class="container">
                <ul id="user_info">
                    <li>
                        @if($pou)
                        <form action="{{url('Secret/Secretx')}}" method="post">
                            {{ csrf_field() }}
                            @foreach ($secret as $v)
                            <input type="hidden" name = 'id' VALUE="21">
                            <div class="form-group">
                                <label for="exampleInputEmail1">密保问题</label>
                                <input value="{{$v->phone}}" type="text" class="form-control width" id="exampleInputEmail1" placeholder="password" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">密保密码</label>
                                <input value="{{$v->secret}}" type="text" class="form-control width" id="exampleInputPassword1" placeholder="truepwd" name="secret">
                            </div>
                            <button type="submit" class="btn btn-default">修改</button>
                            @endforeach
                        </form>
                        @else
                        <form action="{{url('Secret/Secretz')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name = 'id' VALUE="21">
                            <div class="form-group">
                                <label for="exampleInputEmail1">密保问题</label>
                                <input type="text" class="form-control width" id="exampleInputEmail1" placeholder="password" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">密保密码</label>
                                <input type="text" class="form-control width" id="exampleInputPassword1" placeholder="truepwd" name="secret">
                            </div>
                            <button type="submit" class="btn btn-default">保存</button>
                        </form>
                        @endif
                    </li>
                </ul>
            </div>
    </div>
    @if(!empty(session('error')))
        <script>
            alert('{{session('error')}}');
        </script>
    @endif
@endsection
@section('script')

@endsection