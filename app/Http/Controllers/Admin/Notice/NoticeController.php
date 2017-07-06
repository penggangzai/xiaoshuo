<?php

namespace App\Http\Controllers\Admin\Notice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NoticeController extends Controller
{
    public function not()
    {
        $list = DB::table('notice')->get();
        return view('admin.notice.notice',['list'=>$list]);
    }
    // 添加
    public function notadd(Request $request)
    {
        $data=$request->only('title');
        $data['time']= date('Y-m-d');
        foreach($data as $v){
            if(!$v){
                return back()->with(['error'=>'请输入完整信息!','success'=>'warning']);

            }
        }
        $m = DB::table('notice')->insertGetId($data);
       if ($m){
           return back()->with(['error'=>'添加成功!','success'=>'success']);
        }else{
           return back()->with(['error'=>'添加失败!','success'=>'warninr']);
       }
    }

    public function notdel($id)
    {
        //执行删除成功返回影响行数
        $result = DB::table('notice')->where('id', $id)->delete();
        //判断影响行数是否大于0
        if ($result > 0) {
            $info = true;
        } else {
            $info = false;
        }
        return response()->json($info);
    }

    public function notface($id, $f)
    {
        if($f==2){
            DB::table('notice')->update(['face' => '2']);
            DB::table('notice')->where('id', $id)->update(['face' => '1']);
        } else {
            DB::table('notice')->where('id', $id)->update(['face' => '2']);
        }
        return back();
    }
}
