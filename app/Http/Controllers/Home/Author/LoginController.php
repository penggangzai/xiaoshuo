<?php

namespace App\Http\Controllers\Home\Author;

use App\Email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->all();

        foreach ($data as $v) {
            if(empty($v)) {
                return back()->with('error','高手玩我的网址没有必要吧');
            }
        }

        $phone = '/^1(3|4|5|7|8)\d{9}$/';
        if (!preg_match($phone,$data['phone'])) {
            return back()->with('error','高手手机格式不正确');
        }
        $pwd = md5($data['pwd']);
        $result = DB::table('autor')
            ->join('autor_info','autor.id','=','autor_info.aid')
            ->where('phone','=',$data['phone'])
            ->select('autor.pwd','autor.id','autor_info.autorname','autor.status')
            ->get();
//        dd($result[0]);
            if (empty($result[0])) {
                return back()->with('error','账号不存在');
            }
            if ($result[0]->status == 2) {
                return back()->with('error','你的账号已经被禁用咯');
            }
            $result = $result[0];
        if($pwd == $result->pwd) {
            $list = DB::table('autor')->where('id','=',$result->id)->update(['logintime'=>$data['logintime'],'loginip'=>$data['loginip']]);
            $request->session()->put('autor',$result->autorname);
            $_SESSION['id'] = $result->id;
            $_SESSION['name'] = $result->autorname;
            $_SESSION['autor'][$result->id] = $data['phone'];
            return redirect('/home/author/index')->with('error','登录成功');
//            return redirect('admin/prompt')->with(['message' => '登录成功！', 'url' => '/home/author/index', 'jumpTime' => 2, 'status'=> true]);
        }

        return back()->with('error','密码错误,登录失败');
    }

    public function exit1(Request $request)
    {
        $request->session()->forget('autor');
        unset($_SESSION['autor']);
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        return redirect('/');
    }

    public function email(Request $request)
    {
        $data = $request->only(['email','phone']);
       $email = DB::table('autor')
           ->join('autor_info','autor.id','=','autor_info.aid')
           ->where('phone',$data['phone'])
           ->select('autor_info.email')
           ->get();
//        dd($email);

        if (empty($email[0]) ) {
           return back()->with('error','您的邮箱不正确');

       }
       if ($data['email'] != $email[0]->email) {
           return back()->with('error','您的邮箱不正确');
       }

        $arr = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
        $arr = array_flip($arr);
        $arr = implode(array_rand($arr,8));

        $pwd = 'a'.$arr;
        $repwd = md5($pwd);
       $list = DB::table('autor')->where('phone',$data['phone'])->update(['pwd'=>$repwd]);
       if (!$list) {
           return back()->with('error','请稍后在试试');
       }
        $host="smtp.126.com";
        $port=25;
        $user="gangzai_xin@126.com";
        $pass="a123456";
        $from="gangzai_xin@126.com";
        $to=$data['email'];
        $subject="帮你修改的密码";
        $content="您的最新密码为".$pwd.',请尽快修改密码';
        $email = new Email($host,$port,$user,$pass);
        $email->send_mail($from,$to,$subject,$content);

        return back()->with('error','请查看邮箱');

    }
}
