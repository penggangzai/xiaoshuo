<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class LoginnController extends Controller
{
    public function login(Request $login)
    {
        $phone = $login->input('phone');
//        dump($phone);
        $pwd = md5($login->input('pwd'));

        $phoney = DB::table('user')->where('phone',$phone)->first();
        $pwdy = DB::table('user')->where('pwd',$pwd)->first();

        $status = DB::table('user')
            ->where('phone',$phone)
            ->where('pwd',$pwd)
            ->where('status',1)
            ->first();
//        dd($phoney);
        if(!$phoney){
            return back()->with('error', '手机号不存在');
        }else {
            if (!$pwdy) {
                return back()->with('error', '密码不正确');
            } else {
                if (!$status) {
                    return back()->with('error','此账号已被禁用');
                } else {
                    $sql = "select `id` from user where phone='$phone'";
                    $resultt = DB::select($sql);
                    $id = $resultt['0']->id;
                    $sqll = "select `username` from user where phone='$phone'";
                    $resulttt = DB::select($sqll);
                    $username = $resulttt['0']->username;
                    $logintime = date("Y年m月d日 H时i分s秒");
                    DB::table('user')
                        ->where('id',$id)
                        ->update(['logintime'=>"$logintime"]);

                    $_SESSION['home']['phone'] = $phone;
                    $_SESSION['home']['id'] = $id;
                    $_SESSION['admin']['username'] = $username;
                    return redirect('member/index')->with(['message' => '登录成功！', 'url' => '/admin/user', 'jumpTime' => 1, 'status' => true]);
                }
            }
        }
    }

    public function deng()
    {
        return view('home/login');
    }
}