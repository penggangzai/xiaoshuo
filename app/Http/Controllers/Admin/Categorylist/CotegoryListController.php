<?php

namespace App\Http\Controllers\Admin\Categorylist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CotegoryListController extends Controller
{
    //加载书籍分类列表页面
    public function index()
    {
        $id = empty($_GET['d'])?'0': $_GET['d'];
        $data = DB::table('class')->where('pid',$id)->get();
        return view('admin/categorylist/categorylist',['data'=>$data]);

    }
    //执行分类删除操作
    public function del($id)
    {
        //查询该分类是否有子分类
        $list = DB::table('class')->where('pid',$id)->get();
        //判断结果执行对应操作
        if (!empty($list[0])){
            $info['status'] = false;
            $info['ls'] = '请先删除子分类!';
        }else{
            //执行删除成功返回影响行数
            $result = DB::table('class')->where('id',$id)->delete();
            //判断影响行数是否大于0
            if ($result > 0 ) {
                $info['status'] = true;
                $info['ls'] = '删除成功!';
            } else {
                $info['status'] = false;
                $info['ls'] = '删除失败!';
            }
        }
        return response()->json($info);
    }

    // 改变状态操作
    public function state($d, $id)
    {
        // 判断当前状态给相应值
        $d = ($d == 1)?'2':'1';
        //执行状态修改
        DB::table('class')->where('id',$id)->update(['display'=>$d]);
        DB::table('class')->where('pid',$id)->update(['display'=>$d]);
        //返回上一个页面
        return back();
    }
    // 加载修改分类页面
    public function upindex($id)
    {
        // 查询指定分类
        $data = DB::table('class')->where('id',$id)->get();
       //判读查询结果执行对应操作
       if(empty($data['0'])){
           return redirect('admin/clist')->with(['error'=>'该分类不存在!','success'=>'warning']);
       }else{
            return view('admin/categoryedit/categoryedit',['data'=>$data['0']]);
        }

    }
    //执行修改分类
    public function up(Request $request)
    {
        // 接收post数据
        $data = $request->only(['id','name','pid','path','display']);
        $n = DB::table('class')->where('name',$data['name'])->get();
        if(empty($n['0'])){
            $a = DB::table('class')->where('id',$data['id'])->update([
                'name'=>$data['name']
            ]);

        }else{
            return back()->with(['error'=>'该分类名已存在!','success'=>'warning']);
        }


        if ($a){
            return redirect('admin/clist')->with(['error'=>'修改成功!','success'=>'success']);
        }
        return back()->with(['error'=>'修改失败!','success'=>'warning']);
    }

}
