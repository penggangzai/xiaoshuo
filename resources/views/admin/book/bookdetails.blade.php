@extends('admin.index.index')
@section('link')
    <div class="container">
        <div class="row mt50" style="margin-top: 50px">
            <div class="col-md-8">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th colspan="1">书籍详情</th>
                        <th colspan="">

                                <form method="post" action="{{url('admin/bookimg')}}" enctype='multipart/form-data'>
                                {{  csrf_field() }}
                                    <span> <input type="hidden" name="bid" value="{{$data->id}}"></span>

                                <span><input type="file" name="img" class="btn btn-primary btn-sm" style="width:180px;display: inline"></span>
                                <span><button class="btn btn-danger btn-sm ">上传</button></span>
                            </form>

                        </th>
                        <th>操作</th>

                    </tr>
                    <tr>
                        <td>书名:{{$data->bookname}}</td>
                        <td colspan=""><img src="{{url($data->url)}}" alt="" width="140" id="im"></td>
                        <td>
                            <button class="btn btn-danger btn-sm del" data-id="{{$data->id}}">删除
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>作者:</td>
                        <td colspan="2">{{$data->wirter}}</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <P>简介:</P>
                            <p>{{$data->intro}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>上传时间:</td>
                        <td colspan="2">{{$data->time}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection
<script src="{{asset('/js/app.js')}}"></script>
<script>
    $(function () {
// 触发用户删除
        $('.del').click(function () {
            var ac_id = $(this).attr('data-id');
            if (confirm('您确定要 [ 删 除 ] 该用户么?')) {
                var obj = document.getElementById('im');
                delAjax(ac_id, obj);// 执行删除操作
            }
        });

    });
    // 执行AJAX删除的操作
    function delAjax(id, obj) {
        $.ajax({
            type: 'get',
            url: "{{url('admin/delimg')}}/" + id,
            dateType: 'json',
            success: function (data) {

                console.log(data);
                if (data) {
                    alert('删除成功!');
                    obj.src ='';
                } else {
                    alert('删除失败!');
                }
            },
            error: function () {
// AJAX执行失败
                alert('ajax操作失败');
            }
        });
    }
</script>




