<?php

namespace App\Http\Controllers\Admin\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BookSectController extends Controller
{
    // 添加章节书籍页面
    public function section()
    {
        // 查询所有书籍
        $list = DB::table('book')->paginate(6);
        return view('admin/book/booksection', ['list' => $list]);

    }

    public function show($id)
    {
        // 查询当前书籍的所有章节
        $list = DB::table('chapter')->where('bid', $id)->paginate(6);
        return view('admin/book/bookshow', ['list' => $list]);

    }

    public function addindex($id)
    {
        //查询当前最大章节
        $list = DB::table('chapter')->where('bid', $id)->orderBy('tid', 'desc')->get(['tid']);
        // 如果为空给1
        if (empty($list['0'])) {
            $list = '1';
        } else {

            $list = ($list['0']->tid) + 1;
        }

        // 加载添加章节页面
        return view('admin/book/book', ['id' => $id, 'list' => $list]);
    }


    // 执行添加章节方法
    public function add(Request $request)
    {
        //接收数据取出指定字段
        $data = $request->only(['bid', 'tid', 'title', 'contant',]);
        // 判断信息是否完整
        foreach ($data as $k => $v) {
            if (!$v) {
                return back()->with(['error'=>'请输入完整信息！','success'=>'warning']);

            }
        }
        // 写入添加时间
        $data['uptime'] = date('Y-m-d');
        // 后台添加数据状态给1
        $data['status'] = '1';

        //执行添加
        $id = DB::table('chapter')->insertGetId($data);
        if ($id) {
            return back()->with(['error'=>'上传成功!','success'=>'success']);

        } else {
            return back()->with(['error'=>'上传失败!','success'=>'warning']);

        }
    }


    public function sectdel($id)
    {
        //执行删除成功返回影响行数
        $result = DB::table('chapter')->where('id', $id)->delete();
        //判断影响行数是否大于0
        if ($result > 0) {
            $info = true;
        } else {
            $info = false;
        }
        return response()->json($info);
    }


    public function status($id)
    {

        $result = DB::table('chapter')->where('id', $id)->update(['status'=>'1']);
        return back();
    }
}
