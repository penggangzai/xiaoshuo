<?php

namespace App\Http\Controllers\Admin\Control;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class ControlController extends Controller
{
    public function index()
    {
        $data = DB::table('control')->paginate('10');
        if (empty($data)) {
            return back()->with(['error'=>'数据出错,请稍后再试','success'=>'warning']);
//            return back()->with('数据出错,请稍后再试');
        }
        return view('admin/control/controllist',['data'=>$data]);
    }
    //加载添加页面
    public function add()
    {
        return view('admin/control/controladd');
    }
    //执行添加操作
    public function insert(Request $request)
    {
        //储存值
        $request->flash();
        $data = $request->only(['control_name','control','func']);
        $name = DB::table('control')->where('control_name',$data['control_name'])->value('id');
        if ($name > 0) {
            return back()->with(['error'=>'该名称已经存在','success'=>'warning']);
        }

        $result = DB::table('control')->insertGetId(['control_name'=>$data['control_name'],'control'=>$data['control'],'func'=>$data['func']]);
        //判断是不是查询成功
        if ($result > 0) {
            return redirect('/admin/control/index')->with(['error'=>'添加成功!','success'=>'success']);
//            return redirect('admin/prompt')->with(['message' => '添加成功！', 'url' => '/admin/control/index', 'jumpTime' => 3, 'status' => true]);
        } else {
            return back()->withInput();
        }
    }
    //删除
    public function del(Request $request, $id)
    {

        DB::beginTransaction();
        try{
            $result = DB::table('control')->where('id','=',$id)->delete();
            $aid = DB::table('r_control')->where('con_id','=',$id)->delete();

            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
        }

        if ($result == 1) {
            $data['status'] = true;
            $data['info']  = '删除成功';
        } else {
            $data['status'] = false;
            $data['info']  = '删除失败';
        }
        return response()->json($data);
    }
    //加载修改页面
    public function edit(Request $request, $id)
    {
        $data = DB::table('control')->where('id',$id)->select('id','control','control_name','func')->get();
//        dd($data);
        if (empty($data)) {
            return back()->with('数据出错,请稍后再试');
        }
        return view('admin/control/control',['data'=>$data[0]]);
    }

    //执行修改的方法
    public function save(Request $request)
    {
       $data = $request->only('id','control_name','control','func');
       $name = DB::table('control')->where('control_name',$data['control_name'])->value('id');
       if ($name > 0) {
           return back()->with(['error'=>'该名称已经存在','success'=>'warning']);

       }

       $result = DB::table('control')->where('id',$data['id'])->update(['control'=>$data['control'],'control_name'=>$data['control_name'],'func'=>$data['func']]);
        if ($result == 1) {
            return redirect('/admin/control/index')->with(['error'=>'修改成功!','success'=>'success']);
        } else {
            return back()->with(['error'=>'修改失败!','success'=>'warning']);
        }
    }

}
