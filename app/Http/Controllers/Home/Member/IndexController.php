<?php

namespace App\Http\Controllers\Home\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $book = DB::table('banner')
            ->join('banner_book','banner.id','=','banner_book.brid')
            ->where('banner.face', '1')
            ->get(['bookname','url','wirter','intro','bid']);

        $list = DB::table('user')->select('email','sex','username','icon')->where('id','=',$_SESSION['home']['id'])->get();

        if (empty($list[0])) {
            return redirect('home/entryy');
        }
        return view('home/member/Personal',['data'=>$book,'list'=>$list[0]]);
   }

    public function edit()
    {
       
        $id = $_SESSION['home']['id'];
        $list = DB::table('user')->select('email','sex','username','icon')->where('id','=',$id)->get();
        if (empty($list)) {
            return redirect('home/entryy');
        }
        return view('home/member/edit',['list'=>$list[0]]);
   }

    //编辑执行方法
    public function save(Request $request)
    {
        $data = $request->only(['username','email','sex','id']);
//        return response()->json($data);
        $pre_name = "/^[\x{4E00}-\x{9FA5}A-Za-z0-9_]{1,15}$/u";
        $pre_email ="/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
        $pre_phone = "/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/";

        if (!preg_match($pre_name,$data['username'])){
            $data['status'] = false;
            $data['info'] = '命名格式不正确';
            return response()->json($data);
        }

        //执行修改
        $result1 = DB::table('user')->where('id',$data['id'])->update(['username'=>$data['username'],'email'=>$data['email'],'sex'=>$data['sex']]);

//        //做判断

        if (!$result1) {
            $data['status'] = false;
            $data['info'] = '修改失败';
            return response()->json($data);
        } else {
            $data['status'] = true;
            $data['info'] = '修改成功';
            return response()->json($data);
        }

   }

   //短信验证
    public function phone(Request $request,$id)
    {

        $result = DB::table('user')->where('id','=',$id)->value('phone');

        //生成4个随机数
        $arr = implode(array_rand(range(0,9),4));
        session(['home'=>['code'=>[$id=>$arr]]]);

        include_once(public_path()."/phone/Demo/SendTemplateSMS.php");
//        return response()->json($id);

         $aa = sendTemplateSMS($result,array($arr,'2'),"1");
         if ( $aa === null) {
            return response()->json(0);

         }
             return response()->json(1);
   }


   //密码修改
    public function pwd(Request $request)
    {
        $data = $request->only(['id','pwd','repwd','code']);
        $code = $request->session()->get('home');
//        dd($code['code'][$data['id']]);
        if ($code['code'][$data['id']]  != $data['code']) {
                return back()->with('error','验证码不正确');
        }
        if ($data['pwd'] != $data['repwd']) {
            return back()->with('error','俩次输入密码不一次');

        }

        $pwd = md5($data['pwd']);
        $result = DB::table('user')->where('id',$data['id'])->update(['pwd'=>$pwd]);
        if ($result) {
            return back()->with('error','修改成功');
        } else {
            return back()->with('error','修改失败');
        }


    }

    //退出个人中心
    public function out(Request $request)
    {
        unset($_SESSION['home']['id']);
        unset($_SESSION['home']['phone']);
        return redirect('home/entryy');
    }
}
