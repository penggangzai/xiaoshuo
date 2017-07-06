<?php

namespace App\Http\Controllers\Admin\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    public function index()
    {
        $data = DB::table('role')->orderBy('id')->select(['id','desc','duty','status'])->get();
        if (empty($data)) {
            return back()->with('数据出错,请稍后再试');
        }
        return view('admin/role/rolelist',['data'=>$data]);
    }
    //加载职位添加页面
    public function add()
    {

        $data = DB::table('control')->orderBy('id')->select(['control_name','id'])->get();
        return view('admin/role/roleadd',['data'=>$data]);
    }
    //执行添加操作
    public function insert(Request $request)
    {

        //储存值
        $request->flash();
        $data = $request->only(['duty','desc','status','id']);
        $list = $data['id'];
        $pre = "/^[\x{4E00}-\x{9FA5}A-Za-z]+$/u";
        if(!(preg_match($pre,$data['duty']) && preg_match($pre,$data['desc']))) {
            return back()->withInput()->with('没有按照规则填写');
        }
        $name = DB::table('role')->where('duty',$data['duty'])->value('id');
        if ($name > 0) {
            return back()->with(['error'=>'该职称已经存在','success'=>'warning']);
        }
        //事务回滚
        DB::beginTransaction();
        try{
            $result = DB::table('role')->insertGetId(['duty' => $data['duty'], 'desc' => $data['desc'], 'status' => $data['status']]);

            foreach ($list as $v){
                $li[] = DB::table('r_control')->insertGetId(['rid' => $result, 'con_id' => $v]);
            }

             DB::commit();
        }catch (\Exception $e) {
             DB::rollBack();
        }
        //判断是不是查询成功
        if (!empty($li)) {
            return redirect('/admin/role/index')->with(['error'=>'添加成功!','success'=>'success']);
        } else {
            return back()->withInput();
        }
    }

    //删除
    public function del(Request $request, $id)
    {

        DB::beginTransaction();
        try{
            $result = DB::table('role')->where('id','=',$id)->delete();
            $result1 = DB::table('r_control')->where('rid','=',$id)->delete();
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
        }

        if ($result1 > 0 ) {
            $data['status'] = true;
            $data['info']  = '删除成功';
        } else {
            $data['status'] = false;
            $data['info']  = '删除失败';
        }
        return response()->json($data);
    }

    //修改状态
    public function stutus(Request $request,$id)
    {
        $data = $request->only('stutus');
        if ($data['stutus'] == 1){
            $stutus = 2;
        }
        if ($data['stutus'] == 2){
            $stutus = 1;
        }
        $result = DB::table('role')->where('id',$id)->update(['status'=>$stutus]);
        if ($result){
            $data['stutus'] = true;
            $data['info'] = $stutus;
        }else{
            $data['stutus'] = false;
        }
        return response()->json($data);
    }

    //加载编辑页面
    public function edit(Request $request,$id)
    {
        $list = DB::select('select c. `control_name` from `control` c,`role` r,`r_control` o where c.id =o.con_id and r.id=o.rid and r.id=?',[$id]);


        $data = DB::table('role')
            ->select('id','desc','duty','status')
            ->where('id',$id)
            ->get();
        $data1 = DB::table('control')->select('control_name','id')->get();
        if( empty($data) || empty($data1)) {

            return back()->with(['error'=>'数据出错,请稍后再试试!','success'=>'warning']);
        }

        return view('admin/role/roleedit',['data'=>$data[0],'list'=>$list,'data1'=>$data1]);
    }

    //执行编辑方法
    public function save(Request $request)
    {
        $data = $request->all();
        $name = DB::table('role')->where('duty',$data['duty'])->value('id');
        if ($name > 0) {
            return back()->with(['error'=>'该职称已经存在','success'=>'warning']);
        }
        DB::beginTransaction();
        try{
            $result = DB::table('role')->where('id',$data['id'])->update(['duty' => $data['duty'], 'desc' => $data['desc'], 'status' => $data['status']]);

            $a = DB::table('r_control')->where('rid',$data['id'])->delete();
//            dump($a);
            foreach ($data['cid'] as $v){
                $li[] = DB::table('r_control')->insert(['rid' => $data['id'], 'con_id' => $v]);
            }

            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
        }
        //判断是不是查询成功
        if (!empty($li)) {
            return redirect('/admin/role/index')->with(['error'=>'修改成功!','success'=>'success']);
        } else {
            return back()->with(['error'=>'修改出错','success'=>'warning']);
        }

    }
}
