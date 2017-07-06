<?php

namespace App\Http\Controllers\Admin\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BookEditController extends Controller
{
    public function index($id)
    {
        //查询所有分类
        $list = new BookController();
        // 查询当前id的数据
        $data = DB::table('book')->where('id', $id)->get()['0'];
        return view('admin/book/bookedit', ['list' => $list->list, 'data' => $data]);
    }

    public function up(Request $request)
    {
        // 接收表单数据
        $data = $request->only(['bookname', 'wirter', 'cid', 'intro', 'display', 'status', 'id']);

        // 判断书名是否为空
        foreach ($data as $k => $v) {
            if (!$v && $k != 'intro') {
                return back()->with(['error'=>'请输入完整信息！','success'=>'warning']);

            }
        }
        $b = DB::table('book')->where('bookname',$data['bookname'])->get();
        if(empty($b['0'])){
            $a = DB::table('book')->where('id',$data['id'])->update([
                'bookname'=>$data['bookname'] ,
                'wirter'=>$data['wirter'] ,
                'cid'=>$data['cid'] ,
                'status'=>$data['status'] ,
                'display'=>$data['display'] ,
                'intro'=>$data['intro'] ,
            ]);
        }else{
            return back()->with(['error'=>'该书名已存在!','success'=>'warning']);
        }

        if ($a){
            return redirect('admin/booklist')->with(['error'=>'修改成功!','success'=>'success']);

        } else {

            return back()->with(['error'=>'修改失败!','success'=>'warning']);

        }
    }

}
