<?php

namespace App\Http\Controllers\Home\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    //前台列表页方法
    public function index($id = null, $pid = null)
    {
        // 查询一级分类
        $list = DB::table('class')->where('pid', '0')->where('display','1')->get();
        //查询二级分类
        $list_s = DB::table('class')->where('pid', '>', '0')->where('display','1')->get();
        //查全部书籍
        if ($id == 'q') {
            $book_s = DB::table('book')

                ->join('book_img','book.id','=','book_img.bid')

                ->where('book.display','1')

                ->get();
            // 查询指定分类的
        } else {
            $book_s = DB::table('book')
                ->join('book_img','book.id','=','book_img.bid')
                ->where('book.cid', $id)
                ->where('book.display','1')
                ->get();
        }

        if($pid=='0'){
            $book_s = DB::table('class')
                ->where('class.pid', $id)
                ->join('book','class.id','=','book.cid')
                ->join('book_img','book.id','=','book_img.bid')
                ->where('book.display','1')
                ->get();
            }

        return view('home/listing', [
            'list' => $list,
            'list_s' => $list_s,
            'book_s' => $book_s,
            'id'=>$id
        ]);
    }
}
