<?php

namespace App\Http\Controllers\Admin\Feedback;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    // 列表
    public function index()
    {
      $list = DB::table('feedback')->get();
      return view('admin.feedback.feedback',['list'=>$list]);
    }
    // 添加
    public function fadd(Request $request)
    {
        $data = $request->only(['title','text']);
        foreach($data as $v){
            if (!$v){
                return back()->with(['error'=>'请输入完整信息!','success'=>'warning']);

            }
        }

        if(empty($_SESSION['home']['id'])){

            return back()->with(['error'=>'请先登入!','success'=>'warning']);

        }

        $data['uid']= $_SESSION['home']['id'];
        $id = DB::table('feedback')->insertGetId($data);

        if($id){
            return back()->with(['error'=>'反馈成功!','success'=>'success']);

        } else{
            return back()->with(['error'=>'反馈失败!','success'=>'warning']);

        }

    }
    //删除
    public function feedel($id)
    {

        //执行删除成功返回影响行数
        $result = DB::table('feedback')->where('id', $id)->delete();
        //判断影响行数是否大于0
        if ($result > 0) {
            $info = true;
        } else {
            $info = false;
        }
        return response()->json($info);

    }
}
