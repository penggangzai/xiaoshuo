@extends('home.author.model')
@section('link')
    <link rel="stylesheet" href="{{asset('home/css/work.css')}}">
@endsection
@section('info')
@endsection
@section('index')
    <li>
        <a href="{{url('home/author/index')}}"><span class="home"></span>专区首页
        </a>
    </li>
@endsection
@section('work')
    <li class="act">
        <a href="{{url('home/author/work').'/'.$_SESSION['id']}}">
            <span class="works"></span>作品管理
        </a>
    </li>
@endsection
@section('contant')
    <h3 class="title_h3 clear"><span class="icon news"></span>基本信息</h3>
    <p>您的位置&nbsp;&nbsp;&nbsp;信息详情</p>
    <table class="table table_tr">
        <tr>
            <td align="left" valign="top">
                <form method="post" action="{{url('home/author/save')}}" enctype='multipart/form-data' name="regiForm">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$_SESSION['id']}}">
                    <table  cellspacing="0" cellpadding="0" id="main-tab">
                        <tr >
                            <td>电话：</td>
                            <td>
                                <input type="text" name="phone" value="{{$data->phone}}" class="input" readonly>
                            </td>
                        </tr>
                        <tr >
                            <td>笔名：</td>
                            <td>
                                <input type="text" name="autorname" value="{{$data->autorname}}" class="input" onblur="ckEmail__()">
                            </td>
                            <td id="etab"></td>
                        </tr>


                        <tr >
                            <td>邮箱：</td>
                            <td>
                                <input type="text" name="email" value="{{$data->email}}" class="input" onblur="ckEmail()">
                            </td>
                            <td id="eatab"></td>
                        </tr>
                        <tr>
                            <td>
                                性别：
                            </td>
                            <td >
                                <select name="sex">
                                    <option value="1" @if($data->sex == 1) checked @else @endif>&nbsp;&nbsp;先生</option>
                                    <option value="2" @if($data->sex == 2) checked @else @endif>&nbsp;&nbsp;女士</option>
                                </select>
                            </td>
                        </tr>
                        <tr >
                            <td>上传图片：
                            </td>
                            <td >
                                <input type="file" name="img" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp;</td>
                            <td >
                                <button>修改</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
    <div class="clear"></div>
@endsection