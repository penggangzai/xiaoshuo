<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class RegisterController extends Controller
{
    public function register(Request $register)
    {
        $phone = $register->input('phone');
        $pwdy = $register->input('pwd');
        $email = $register->input('email');
        $sex = $register->input('sex');
        $status = '1';
        $utime = date("Y年m月d日 H时i分s秒");
        $cla = DB::table('user')->where('phone',$phone)->first();
        $password = $register->input('password');

        $pre_email ="/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
        $pre_phone = "/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/";
        $pre_pwd = "/^[a-zA-Z]\w{5,17}$/";

        if(!preg_match($pre_phone,$phone)) {
            return back()->with('error','手机格式不正确');
        }
        if ($cla){
            return back()->with('error','手机号有重复');
        }
        if(!preg_match($pre_email,$email)) {
            return back()->with('error','邮箱格式不正确');
        }
        if(!preg_match($pre_pwd,$pwdy)){
            return back()->with('error','密码格式不正确');
        }
        if($pwdy !== $password){
            return back()->with('error','密码和确认密码不匹配');
        }
        $pwd = md5($pwdy);
//        dd($pwd);

        DB::insert('insert into user (`phone`,`pwd`,`email`,`sex`,`status`,`utime`) values(?,?,?,?,?,?)',["$phone", "$pwd", "$email", "$sex", "$status", "$utime"]);

        return view('home/login');
    }

    public function deng()
    {
        return view('home/register');
    }
}