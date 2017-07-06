<?php

namespace App\Http\Controllers\Admin\Audio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AudioController extends Controller
{
    public function mp()
    {
        $list = DB::table('mp3')->get();
        return view('admin.audio.audio',['list'=>$list]);
    }
    // 添加
    public function mpadd(Request $request)
    {
        $data=$request->only('name','url');
        $data['time']= date('Y-m-d');
        foreach($data as $v){
            if(!$v){
                return back()->with(['error'=>'请输入完整信息!','success'=>'warning']);
            }
        }
        $m = DB::table('mp3')->insertGetId($data);
       if ($m){
           return back()->with(['error'=>'添加成功!','success'=>'success']);
        }else{
           return back()->with(['error'=>'添加失败!','success'=>'warning']);
       }
    }

    public function mpdel($id)
    {
        //执行删除成功返回影响行数
        $result = DB::table('mp3')->where('id', $id)->delete();
        //判断影响行数是否大于0
        if ($result > 0) {
            $info = true;
        } else {
            $info = false;
        }
        return response()->json($info);
    }

    public function mpdisplay($id, $d)
    {
        $dis = ($d == 1)?'2':'1';
        DB::table('mp3')->where('id', $id)->update(['display' => $dis]);
        return back();

    }

    public function mpface($id, $f)
    {
        if($f==2){
            DB::table('mp3')->update(['face' => '2']);
            DB::table('mp3')->where('id', $id)->update(['face' => '1']);
        } else {
            DB::table('mp3')->where('id', $id)->update(['face' => '2']);
        }
        return back();
    }
}
