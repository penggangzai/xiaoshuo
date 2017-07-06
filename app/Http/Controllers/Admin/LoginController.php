<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class LoginController extends Controller
{
    public function login(Request $login)
    {
        $user = $login->input('user');
        $pwd = md5($login->input('pwd'));
//        dd($user, $pwd);

        $cla = DB::table('message')->where('user',$user)->first();
        $claa = DB::table('message')->where('pwd',$pwd)->first();

        if (!$cla){
            return back()->with('error','用户不正确');
        }else{
            if (!$claa){
                return back()->with('error','密码不正确');
            }else{

                $sqlll = "select `status` from message where user='$user'";
                $resultttt = DB::select($sqlll);
                $status = $resultttt['0']->status;

                if($status == 2){
                    return back()->with('error','用户已被禁用');
                }else{
                    $sql = "select `id` from message where user='$user'";
                    $resultt = DB::select($sql);
                    $id = $resultt['0']->id;
                    $sqll = "select `name` from message where user='$user'";
                    $resulttt = DB::select($sqll);
                    $logintime = date("Y年m月d日 H时i分s秒");
                    $name = $resulttt['0']->name;

                    DB::table('message')
                        ->where('id',$id)
                        ->update(['logintime'=>$logintime]);

//                  dd($name);
                    $_SESSION['admin']['user'] = $user;
                    $_SESSION['admin']['id'] = $id;
                    $_SESSION['admin']['name'] = $name;

                    return redirect('/admin/admindex');
                }
            }
        }
    }

    public function deng()
    {
        return view('admin/login');
    }

    public function out()
    {
        unset($_SESSION['admin']['user']);
        unset($_SESSION['admin']['id']);
        unset($_SESSION['admin']['name']);
        return redirect('admin/entry');

    }

    public function index()
    {
        return view('admin.index.admindex');

    }
}