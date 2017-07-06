<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    // 加载分类页面
    public function index($id = null, $path = null)
    {
        $pid = empty($id) ? '0' : $id;
        $path = empty($path) ? '0,' : $path . $pid . ',';
        return view('admin/category/category', ['pid' => $pid, 'path' => $path]);
    }

    public function add(Request $request)
    {
        // 判断name是否为空
        if (!$request->has('name')) {
            return back();
        }
        $data = $request->only(['name', 'pid', 'path', 'display']);
        // 查询class表中分类名是否存在
        $cla = DB::table('class')->where('name', $data['name'])->first();
        if ($cla == null) {


            $id = DB::table('class')->insertGetId($data);
           if($id){
               return redirect('admin/clist')->with(['error'=>'添加成功!','success'=>'success']);
           }

        }

        return back()->with(['error'=>'添加失败!','success'=>'warning']);

    }
}
