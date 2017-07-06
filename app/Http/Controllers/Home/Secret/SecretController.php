<?php

namespace App\Http\Controllers\Home\Secret;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class SecretController extends Controller
{
    // 前台密保页面
    public function dengg()
    {
        $id = $_SESSION['home']['id'];
        $nei = DB::table('secret')
            ->where('uid', '=', $id)
            ->count();

        if($nei){
            $pou = true;
            $secret = DB::table('secret')
                ->where('uid', '=', $id)
                ->get(['secret','phone']);
            return view('home/member/secret', ['secret'=>$secret, 'pou'=>$pou]);
        }else{
            $pou = false;
            return view('home/member/secret', ['pou'=>$pou]);
        }

    }

    // 密保添加
    public function dengz(Request $add)
    {
        $uid = $_SESSION['home']['id'];
        $phone = $add->input('phone');
        $secret = $add->input('secret');
//        var_dump($uid, $phone, $secret);die;

        DB::insert('insert into secret (`uid`,`secret`,`phone`) values(?,?,?)',["$uid", "$secret", "$phone"]);
        $data = DB::table('secret')->get();
        return redirect('admin/prompt')->with(['message' => '添加成功！', 'url' => '/member/index', 'jumpTime' => 1, 'status'=> true]);
    }

    // 密保修改页面
    public function dengx(Request $add)
    {
        $uid = $_SESSION['home']['id'];
        $phone = $add->input('phone');
        $secret = $add->input('secret');

        DB::table('secret')
            ->where('uid',$uid)
            ->update(['phone'=>$phone,'secret'=>$secret]);
        return redirect('admin/prompt')->with(['message' => '修改成功！', 'url' => '/member/index', 'jumpTime' => 1, 'status'=> true]);
    }

    // 找回密码页面
    public function zaohui()
    {
        return view('home/secret');
    }

    // 密保问题页面
    public function wenti(Request $wen)
    {
        $phone = $wen->input('phone');

        $nei = DB::table('user')
            ->where('phone', '=', $phone)
            ->count();

        if($nei){
            $id = DB::table('user')
                ->where('phone', '=', $phone)
                ->get(['id']);
            $uid = $id[0]->id;

//            var_dump($uid);die;

            $secret = DB::table('secret')
                ->where('uid', '=', $uid)
                ->get(['phone']);
//            var_dump($secret);die;
            if(empty($secret[0])){
                return back()->with('error','你没有密保无法找回');
            }

            foreach($secret as $k=>$v){
                $secrett[$k]['phone'] = $v->phone;
                $secrett[$k]['phonee'] = $phone;
            }

//            var_dump($secrett);die;

            return view('home/secret2', ['secrett'=>$secrett]);
        }else{
            return back()->with('error','手机号不存在');
        }
    }

    // 执行判断密保
    public function zhix(Request $zhix)
    {
        $phonee = $zhix->input('phonee');
        $secretz = $zhix->input('secret');
//        var_dump($phonee);die;

        $id = DB::table('user')
            ->where('phone', '=', $phonee)
            ->get(['id']);

        $uid = $id[0]->id;
//        var_dump($uid);die;

        $secret = DB::table('secret')
            ->where('uid', '=', $uid)
            ->get(['secret']);

        $secrett = $secret[0]->secret;

//        var_dump($secretz);die;
        if($secrett == $secretz){
            return view('home/secret3', ['id'=>$id]);
        }else{
            return redirect('admin/prompt')->with(['message' => '密保不正确！', 'url' => '/home/secret', 'jumpTime' => 1, 'status'=> true]);
        }
    }



    // 找回密码页面
    public function zixg(Request $xiugi)
    {
        $id = $xiugi->input('id');
        $pwdd = $xiugi->input('pwd');

        $pwd = md5($pwdd);

        DB::table('user')
            ->where('id',$id)
            ->update(['pwd'=>$pwd]);

        return redirect('admin/prompt')->with(['message' => '修改成功！', 'url' => '/home/entryy', 'jumpTime' => 1, 'status'=> true]);
    }
}