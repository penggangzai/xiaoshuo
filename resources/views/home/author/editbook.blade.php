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
    <h3 class="title_h3 clear"><span class="icon news"></span>作品管理</h3>
    <p>您的位置&nbsp;&nbsp;&nbsp;修改书籍</p>
    <table class="table table_tr">
        <tr>
            <td align="left" valign="top">
                <form method="post" action="{{url('home/author/editbook')}}" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <table  cellspacing="0" cellpadding="0" id="main-tab">
                        <tr >
                            <td>书籍名：</td>
                            <td>
                                <input type="text" name="bookname" value="{{$data->bookname}}" class="input" readonly>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                状态：
                            </td>
                            <td >
                                <select name="status">
                                    <option value="1" @if($data->status == 1)checked @else @endif>&nbsp;&nbsp;连载</option>
                                    <option value="2" @if($data->status == 2)checked @else @endif>&nbsp;&nbsp;完结</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>简介:
                            </td>
                            <td>
                                <textarea name="intro" cols="50" rows="2" style='vertical-align:top'
                                          class="text-word">{{$data->intro}}</textarea>
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
