@extends('home.index')
@section('link')
    <link type="text/css" rel="stylesheet" href="{{asset('home/index/css/rig2.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('home/index/css/rig1.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('home/index/css/rig0.css')}}" />
@endsection
@section('contant')
    <div class="container">
        <div class="row" style="min-height:500px ">
            <div class="col-md-1"  ></div>
            <div class="col-md-8" style="border: 1px solid #ccc;min-height: 50px !important;">
                <div class="g-bdw g-bdw-1">
                    <div class="g-bd-large g-bd f-cb">
                        <div class="m-breadcrumbs">当前位置：
                            爱阅读中文网<span class="sep">&gt;</span>
                            {{$book->name}}
                                <span class="sep">&gt;</span>
                            {{$book->bookname}}
                        </div>
                    </div>
                </div>
                    {{--小说位子显示--}}
                <div class="m-bookdetail" id="identify"  >
                        <a href="javascript:;" class="cover">
                            <img src="{{asset($book->url)}}" width="172" height="237" alt="绝世神医"/>
                        </a>
                        <div class="f-fl" style="width:506px;">
                            <h3 title=" {{$book->bookname}}"> {{$book->bookname}}
                                <span>
                                    <a href="/"> {{$book->wirter}}</a>&nbsp;&nbsp;著</span>
                            </h3>
                            <div>
                                {{$book->intro}}
                            </div>

                            <div class="ops" id="J_ops">
                                <a href="{{url('home/withindex')}}/{{$book->id}}" class="btn btn-main-fill" id="J_readNow" target="_blank" style="height: 45px">立即阅读</a>
                                <a href="{{url('member/add').'/'.$book->id}}" class="btn btn-main-stroke j-addSub" id="J_addSub" style="height: 45px">收藏书籍</a>
                                <a href="{{url('member/addvo').'/'.$book->id}}" class="btn btn-main-stroke j-addSub" id="J_addSub" style="height: 45px">投票书籍</a>
                                <a href="{{url('home/listchapter')}}/{{$book->id}}" class="btn btn-main-stroke j-addSub" id="J_addSub" style="height: 45px">查看章节</a>
                            </div>
                        </div>
                </div>
                <!-- 书籍信息 -->

                <div class="score">
                    <div class="head" style="border:1px solid #ccc;color: #ccc;"><h3>评论区</h3></div>
                    <div class="zong" >
                        @foreach ($userr as $v=>$k)
                            @if($v <= '5')
                                <div class="dan" style="border:0px ;color: #ccc;">
                                    <div class="limg">
                                        <img src="{{url('uploads'.'/'.substr($k['img'], 0, 4).'/'.substr($k['img'], 4, 2).'/'.substr($k['img'], 6, 2).'/'.$k['img'])}}" width="50"height="50">
                                        <h5>{{$k['phone']}}</h5>
                                    </div>
                                    <div class="pinglun">
                                        <h3 style="border:0px;">{{$k['comment']}}</h3><a style="margin-left:480px;" id="J_addSub" href="{{url('comment/commentdatal')}}/{{$k['id']}}/{{$book->bookname}}">回复({{$k['sl']}})</a>
                                        <a class="si" style="float:right;border:0px solid #000; background-color:#fff;margin-right:50px;">
                                            <img style="float:left;" src="{{asset('/images/timg.jpg')}}" width="20"height="20">
                                            <h4 class="zhil" data-id="{{$k['id']}}" data-uid="{{$uid}}" style="float:right;margin-top:3px;">{{$k['agree']}}<h4>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <hr><a class="ping" href="" style="color: #ccc;">更多评论</a>
                    </div>
                    <div >
                        @if($uid !== false)
                            <form class="woa" method="post" action="{{url('comment/commentaddx')}}">
                                {{  csrf_field() }}
                                <input type="hidden" name="bid" value="{{$bid}}">
                                <input type="hidden" name="uid" value="{{$uid}}">
                                <tr style="float:left;" onMouseOut="this.style.backgroundColor='#ffffff'"
                                    onMouseOver="this.style.backgroundColor='#edf5ff'">
                                    <td style="float:left;" align="right" valign="middle" class="borderright borderbottom bggray">
                                    </td>
                                    <td style="float:left;" align="left" valign="middle" class="borderright borderbottom main-for">
                                        <textarea id="editor_id" name="comment" style="width:700px;height:240px;float:left;"></textarea>
                                    </td>
                                </tr>
                                <input style="float:right;" name="" type="submit" value="提交" class="text-but">
                            </form>
                        @else
                            <div style="width:745px;font-size:20px;text-align:center;height:400px;line-height:400px;">
                                <a href="{{url('home/entryy')}}" style="color: #ccc;">请登录后在评论</a>
                            </div>
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

            <div class="col-md-2">
                <!-- 本书粉丝榜 -->
                    <div class="m-bookstatus">
                        <i class="angle-r"></i><i class="angle-inner-r"></i>
                        <div class="starlevel">
                            <div class="f-star">
                                @if(!$paosh)
                                    <span class="no si2" data-bid="{{$bid}}" data-uid="{{$uid}}">&nbsp;</span>
                                    <span class="no si4" data-bid="{{$bid}}" data-uid="{{$uid}}">&nbsp;</span>
                                    <span class="no si6" data-bid="{{$bid}}" data-uid="{{$uid}}">&nbsp;</span>
                                    <span class="no si8" data-bid="{{$bid}}" data-uid="{{$uid}}">&nbsp;</span>
                                    <span class="no si10" data-bid="{{$bid}}" data-uid="{{$uid}}">&nbsp;</span>
                                @else
                                    @if($paosh <= 2)
                                        <span>&nbsp;</span>
                                        <span class="no">&nbsp;</span>
                                        <span class="no">&nbsp;</span>
                                        <span class="no">&nbsp;</span>
                                        <span class="no">&nbsp;</span>
                                    @elseif($paosh <= 4)
                                        <span>&nbsp;</span>
                                        <span>&nbsp;</span>
                                        <span class="no">&nbsp;</span>
                                        <span class="no">&nbsp;</span>
                                        <span class="no">&nbsp;</span>
                                    @elseif($paosh <= 6)
                                        <span>&nbsp;</span>
                                        <span>&nbsp;</span>
                                        <span>&nbsp;</span>
                                        <span class="no">&nbsp;</span>
                                        <span class="no">&nbsp;</span>
                                    @elseif($paosh <= 8)
                                        <span>&nbsp;</span>
                                        <span>&nbsp;</span>
                                        <span>&nbsp;</span>
                                        <span>&nbsp;</span>
                                        <span class="no">&nbsp;</span>
                                    @elseif($paosh <= 10)
                                        <span>&nbsp;</span>
                                        <span>&nbsp;</span>
                                        <span>&nbsp;</span>
                                        <span>&nbsp;</span>
                                        <span>&nbsp;</span>
                                    @endif
                                @endif
                            </div>
                            <span class='score'>{{$paosh}}</span>
                            <span class="num">{{$chasl}}人评分</span>
                        </div>
                        <table>
                            <tr>
                                <td>状态：</td>
                                <td><span class="status">
                                {{($book->status)=='1'?'连载中':'已完结'}}
                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>分类：</td>
                                <td> {{$book->name}}</td>
                            </tr>

                        </table>
                    </div>
                <!-- 作者相关信息 -->
                    <div class="m-author">
                    <!-- 作者公告 -->
                        <div class="m-intro">
                            <a class="pointer" href="" target="_blank">
                                <img src="{{asset($book->url)}}" width="60" height="60" class="photo" alt="粉嘟嘟的馒头"/>
                                <span>作者</span>
                                <p class="name">{{$book->wirter}}</p>
                            </a>
                            <div class="info" >
                                作者忙于写作，虾米也没说
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

            <!-- 作者的其他书籍 -->
    <script src="{{asset('js/app.js')}}"></script>
    <script>

        // 2分触发
        $('.si2').click(function () {
            var sid = $(this).attr('data-bid');
            var uid = $(this).attr('data-uid');
            var score = 2;
            if (confirm("亲确定要给1星评价吗")) {
                manag(sid, uid, score);
            }
        });

        // 4分触发
        $('.si4').click(function () {
            var sid = $(this).attr('data-bid');
            var uid = $(this).attr('data-uid');
            var score = 4;
            if (confirm("亲真的只给2星评价吗")) {
                manag(sid, uid, score);
            }
        });

        // 6分触发
        $('.si6').click(function () {
            var sid = $(this).attr('data-bid');
            var uid = $(this).attr('data-uid');
            var score = 6;
            if (confirm("感谢亲的3星评价!")) {
                manag(sid, uid, score);
            }
        });

        // 8分触发
        $('.si8').click(function () {
            var sid = $(this).attr('data-bid');
            var uid = $(this).attr('data-uid');
            var score = 8;
            if (confirm("感谢亲的4星评价!")) {
                manag(sid, uid, score);
            }
        });

        // 10分触发
        $('.si10').click(function () {
            var sid = $(this).attr('data-bid');
            var uid = $(this).attr('data-uid');
            var score = 10;
            if (confirm("谢谢亲的5星好评!")) {
                manag(sid, uid, score);
            }
        });


        // 执行评价
        function manag(sid, uid, score) {
            $.ajax({
                type: 'get',
                url: "{{url('dainzan/Pin')}}/" + sid + "/" + uid + "/" + score,
                dateType: 'json', // 处理返回的响应值为JSON
                success: function (data) {
                    console.log(data);
                    window.location.reload();
                },
                error: function () {
                    // AJAX执行失败
                    alert('ajax操作失败');
                }
            });
        }


        // 触发状态

        $('.zhil').click(function () {
            var comid = $(this).attr('data-id');
            var uid = $(this).attr('data-uid');
            var obj = $(this);
            stutus(uid, comid, obj);
        });


        function stutus(uid,comid,obj) {
            $.ajax({
                type: 'get',
                url: "{{url('dainzan/dainzann')}}/" + comid + "/" + uid,
                dateType: 'json', // 处理返回的响应值为JSON
                success: function (data) {
                    console.log(data);
                    obj.html(data);
                },
                error: function () {
                    // AJAX执行失败
                    alert('请登录在点赞');
                }
            });
        }
    </script>
@endsection






