<?php

namespace App\Http\Controllers\Admin\Auser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Model\ImgUp;


class AuserController extends Controller
{
    public function index()
    {
        $data = DB::table('message')
            ->select('id','icon','phone','status','logintime','user')
            ->get();
        $list = DB::table('message')
            ->join('m_role','message.id','=','m_role.mid')
            ->join('role','role.id','=','m_role.rid')
            ->select('role.duty','message.id','message.icon','message.phone','message.status','message.logintime','message.user')
            ->get();
        foreach ($list as $k => $v){

            $a[$v->id][] = $v->duty ;
        }
        if (empty($data) || empty($a)) {
            return back()->with(['error'=>'数据出错,请稍后再试!','success'=>'warning']);
        }
//        var_dump($a);die;
        return view('admin/auser/auserlist',['data'=>$data,'list'=>$a]);
    }
    //加载添加页面
    public function add()
    {
       $data =  DB::table('role')->orderBy('id')->select(['duty','id'])->get();
      return view('admin/auser/auseradd',['data'=>$data]);
    }

    //查询账号是不是存在
    public function check(Request $request, $user)
    {
     $result = DB::table('message')->where('user',$user)->value('id');
        if ($result > 0) {
            $data['status'] = false;
            $data['info']  = '该账号已经存在';
        } else {
            $data['status'] = true;

        }
        return response()->json($data);
    }

    //执行用户的注册
    public function insert(Request $request)
    {
        //储存值
        $data = $request->all();
        $pre_phone = '/^1(3|4|5|7|8)\d{9}$/';
        $pre_user = '/^[a-zA-Z][a-zA-Z0-9_]{4,15}$/';
        $pre_pwd = '/^[a-zA-Z]\w{5,17}$/';
        if(!preg_match($pre_phone,$data['phone'])){

            return back()->with(['error'=>'手机格式不正确!','success'=>'warning']);
        }
        if(!preg_match($pre_pwd,$data['pwd'])){
            return back()->with(['error'=>'密码格式不正确!','success'=>'warning']);
        }
        if(!preg_match($pre_user,$data['user'])){
            return back()->with(['error'=>'账号格式不正确!','success'=>'warning']);
        }

        $result = DB::table('message')->where('user',$data['user'])->value('id');
        if ($result > 0) {
            return back()->with(['error'=>'账号已经存在!','success'=>'warning']);
        }

        $pwd = md5($data['pwd']);

        if ( !empty($request->file())) {
            $list = new ImgUp();
            $img = $list->upimg($request);
            if (!$img) {
                return back()->with(['error'=>'图片过大上传出问题','success'=>'warning']);
            }
            $data['icon'] = $img;
        } else {
            $data['icon'] = '';
        }

        //事务回滚
        DB::beginTransaction();
        try{
            $result1 = DB::table('message')->insertGetId(['phone' => $data['phone'], 'user' => $data['user'], 'pwd' =>$pwd ,'status'=>$data['status'],'icon'=>$data['icon']]);
            foreach ($data['id'] as $v){
                $li[] = DB::table('m_role')->insertGetId(['mid' => $result1, 'rid' => $v]);
            }

            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
        }
        if(empty($li)){
            return back()->with(['error'=>'添加不成功','success'=>'warning']);
        }

        return redirect('/admin/auser/index')->with(['error'=>'添加成功!','success'=>'success']);
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
        $result = DB::table('message')->where('id',$id)->update(['status'=>$stutus]);
        if ($result){
            $data['stutus'] = true;
            $data['info'] = $stutus;
        }else{
            $data['stutus'] = false;
        }
        return response()->json($data);
    }

    //加载编辑页面
    public function edit(Request $request ,$id)
    {
//        $list = DB::select('select `duty` from `message` m,`role` r,`m_role` o where m.id =o.mid and r.id=o.rid and m.id=?',[$id]);
        $list = DB::table('m_role')
            ->join('message','message.id','=','m_role.mid')
            ->join('role','role.id','=','m_role.rid')
            ->where('message.id','=',2)
            ->select('role.duty')
            ->get();

        $data = DB::table('message')
            ->select('id','icon','phone','status','logintime','user')
            ->where('id',$id)
            ->get();
        $data1 = DB::table('role')->select('duty','id')->get();
//        dd($list,$data,$data1);
        if(empty($list) || empty($data) || empty($data1)) {
            return back()->with('error','数据出错,请稍后再试试');
        }

        return view('admin/auser/auseredit',['data'=>$data[0],'list'=>$list,'data1'=>$data1]);
    }

    //执行编辑方法
    public function save(Request $request)
    {
        $data = $request->all();

        //事务回滚
        DB::beginTransaction();
        try{
            $result1 = DB::table('message')->where('id',$data['id'])->update(['phone' => $data['phone'], 'user' => $data['user'] ,'status'=>$data['status']]);

            $row = DB::table('m_role')->where('mid','=',$data['id'])->delete();

            foreach ($data['rid'] as $v){
                $li[] = DB::table('m_role')->insertGetId(['mid' => $data['id'], 'rid' => $v]);
            }

            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
        }
        if(empty($li)){
            return back()->with(['error'=>'编辑不成功!','success'=>'warning']);
        }

        return redirect('/admin/auser/index')->with(['error'=>'编辑成功!','success'=>'success']);
    }
}
