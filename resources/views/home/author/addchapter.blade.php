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
    <p>您的位置&nbsp;&nbsp;&nbsp;添加章节</p>
    <table class="table table_tr">
        <tr>
            <td align="left" valign="top">
                <form method="post" action="{{url('home/author/chapterinsert')}}" enctype='multipart/form-data'>
                    {{  csrf_field() }}
                    <input type="hidden" name="status" value="2">
                    <input type="hidden" name="bid" value="{{$bid}}" >
                    <table>
                        <tr>
                            <td>书本名称</td>
                            <td> <input type="text" value="{{$book->bookname}}" readonly></td>

                        </tr>
                        <tr>
                            <td >章节标题：
                            </td>
                            <td >
                                <input type="text" name="title" value="" class="input">
                            </td>
                        </tr>
                        <tr>
                            <td >章节编号：
                            </td>
                            <td >
                                <input type="text" name="tid" value="{{$list}}" readonly  class="input">
                            </td>
                        </tr>
                        <tr>
                            <td>章节内容:
                            </td>
                            <td>
                                <textarea id="editor_id" name="contant" style="width:700px;height:240px;"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                <button>上传</button>
                                <button type="reset">重置</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
    <div class="clear"></div>
@endsection
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
