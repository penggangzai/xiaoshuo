<?php

namespace App\Http\Controllers\Admin\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BookListController extends Controller
{
    public function index()
    {
        //查询book表或取所有的书名
        $list = DB::table('book')->paginate(6);
        return view('admin.book.booklist', ['list' => $list]);
    }

    public function del($id)
    {
    	
        //查询当前书籍的图片地址
        $url = DB::table('book_img')->where('bid', $id)->get(['url']);
        //判断查询结果
        if (!empty($url['0'])){
        	// 判断文件是否存在
        	$file = is_file($url['0']->url);
        	
        	if($file){
        	// 执行图片删除
            unlink($url['0']->url);
        	}
            // 执行图片名删除
            DB::table('book_img')->where('bid', $id)->delete();
        }

        // 删除当前书籍的所有章节
        DB::table('chapter')->where('bid', $id)->delete();
        // 删除书籍名
        $result = DB::table('book')->where('id', $id)->delete();
        //判断影响行数是否大于0
        if ($result > 0) {
            $info = true;
        } else {
            $info = false;
        }
        return response()->json($info);
    }

    // 改变是否上下架操作
    public function display($d, $id)
    {
        // 判断当前状态给相应值
        $d = ($d == 1) ? '2' : '1';
        //执行状态修改
        DB::table('book')->where('id', $id)->update(['display' => $d]);
        //返回上一个页面
        return back();
    }
    //改变是否连载或完结
    public function status($d, $id)
    {
        // 判断当前状态给相应值
        $d = ($d == 1) ? '2' : '1';
        //执行状态修改
        DB::table('book')->where('id', $id)->update(['status' => $d]);
        //返回上一个页面
        return back();
    }
    // 改变是否在首页显示
    public function face($d, $id)
    {
        // 把cid为$d的face改为2
        DB::table('book')->where('cid', $d)->update(['face'=>'2']);
        // 把id为当前$id的改为1
        DB::table('book')->where('id',$id)->update(['face'=>'1']);
        //返回上一个页面
        return back();
    }

    public function show($id)
    {
        $data = DB::table('book')->where('id', $id)->get(['bookname', 'wirter', 'intro', 'time']);
        $b_img = DB::table('book_img')->where(['bid' => $id, 'face' => '1'])->get(['url']);

        if (empty($b_img[0])) {
            $b_img = '';
            $data = $data[0];
            $data->url = $b_img;
        } else {
            $b_img = $b_img[0];
            $data = $data[0];
            $data->url = $b_img->url;
        }

        $data->id = $id;
        $img = DB::table('book_img')->where('bid', $id)->get(['id', 'url', 'face','img','bid']);
        return view('admin/book/bookdetails',['data'=>$data,'img'=>$img]);

    }
}
