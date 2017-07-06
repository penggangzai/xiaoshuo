@extends('home.index')
@section('link')
    <link type="text/css" rel="stylesheet" href="{{asset('home/index/css/rig2.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('home/index/css/rig1.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('home/index/css/rig3.css')}}" />
@endsection
@section('contant')
    <div class="container">
        <div class="row">
            <div class="col-md-1" ></div>
            <div class="col-md-8" style="border: 1px solid #ccc;height: 1500px">
                <div class="score">
                    <div class="head"><h3>{{$bookname}}>帖子专区</h3></div>
                    <div class="zongg">
                        @foreach ($comd as $v=>$k)
                                <div class="dan">
                                    <div class="limg">
                                        <img src="{{url('uploads'.'/'.substr($k->img, 0, 4).'/'.substr($k->img, 4, 2).'/'.substr($k->img, 6, 2).'/'.$k->img)}}" width="50"height="50">
                                        <h5>{{$k->phone}}</h5>
                                    </div>
                                    <div class="pinglun">
                                        <h3>{{$k->comment}}</h3><button style="float:right;border:0px solid #000; background-color:#fff;margin-right:50px;"><img style="float:left;" src="{{asset('/images/timg.jpg')}}" width="20"height="20"><h4 style="float:right;margin-top:3px;">{{$k->agree}}<h4></button>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="zong">
                        @foreach ($comdd as $v=>$k)
                            <div class="dan">
                                <div class="limg">
                                    <img src="{{url('uploads'.'/'.substr($k->img, 0, 4).'/'.substr($k->img, 4, 2).'/'.substr($k->img, 6, 2).'/'.$k->img)}}" width="50"height="50">
                                    <h5>{{$k->phone}}</h5>
                                </div>
                                <div class="pinglun">
                                    <h3>{{$k->comments}}</h3>
                                </div>
                            </div>
                        @endforeach
                        <hr>
                    </div>
                    <div>
                        @if($uid !== false)
                            <form class="woa" method="post" action="{{url('comment/commentaddxx')}}">
                                {{  csrf_field() }}
                                <input type="hidden" name="comid" value="{{$comid}}">
                                <input type="hidden" name="uid" value="{{$uid}}">
                                <tr style="float:left;" onMouseOut="this.style.backgroundColor='#ffffff'"
                                    onMouseOver="this.style.backgroundColor='#edf5ff'">
                                    <td style="float:left;" align="right" valign="middle" class="borderright borderbottom bggray">
                                    </td>
                                    <td style="float:left;" align="left" valign="middle" class="borderright borderbottom main-for">
                                        <textarea id="editor_id" name="comments" style="width:700px;height:240px;float:left;"></textarea>
                                    </td>
                                </tr>
                                <input style="float:right;" name="" type="submit" value="提交" class="text-but">
                            </form>
                        @else
                            <div style="width:745px;font-size:20px;text-align:center;height:400px;line-height:400px;">
                                <a href="{{url('home/entryy')}}">请登录后在评论</a>
                            </div>
                        @endif

                        @if(!empty(session('error')))
                            <script>
                                alert('{{session('error')}}');
                            </script>
                        @endif
                    </div>
                    <script src="{{asset('/kindeditor/kindeditor-all.js')}}"></script>
                    <script>
                        KindEditor.ready(function (K) {
                            window.editor = K.create('#editor_id', {
                                allowImageUpload: true,
                                uploadJson: '/personal/article/upload',
                                afterUpload: function () {
                                    this.sync();
                                },
                                afterBlur: function () {
                                    this.self.sync();
                                },
                                items: [
                                    'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                                    'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                                    'insertunorderedlist', '|', 'emoticons', 'link', 'media', '|', 'image']
                            });
                        });

                    </script>
                </div>

            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

            <!-- 作者的其他书籍 -->
@endsection






