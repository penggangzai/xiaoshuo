<?php

namespace App\Http\Controllers\admin\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Intervention\Image\Facades\Image;

class UseraddController extends Controller
{
    // 加载用户添加页面
    public function index()
    {
        return view('admin/user/useradd');
    }

    public function add(Request $useradd)
    {
        // 处理图片
        $file = $useradd->File();
        $key = key($file);

        if ($_FILES[$key]['error'] > 0) {

            switch ($_FILES[$key]['error']) {
                case '1':
                    $msg = '孩子, 回家重新上传, 文件太大了, 不要超过2M';
                    return back();
                    break;
                case '2':
                    $msg = '请打开F12, 删除 MAX_FILE_SIZE , 即可正常上传';
                    return back();
                    break;
                case '3':
                    $msg = '请查看网线是否连接好';
                    return back();
                    break;
                case '4':
                    $msg = '请不要调戏我, 上传一个给我';
                    return back();
                    break;
                case '6':
                    $msg = '请联系网管, 晚上啥时候约一下, 连个目录都不给我';
                    return back();
                    break;
                case '7':
                    $msg = '再联系网管, 你想什么时候死, 说一声, 连个权限都不给我';
                    return back();
                    break;
            }
        }
        if (!is_uploaded_file($_FILES[$key]['tmp_name'])) {
            return back();
        }

        // 判断文件类型
        $ext = $useradd->file('img')->getClientOriginalExtension();
        if (!in_array($ext, array('jpg', 'png', 'jpeg'))) {
//                ('不合法的文件类型');
            return back();
        }

        $phone = $useradd->input('phone');
        $pwd = md5($useradd->input('pwd'));
        $email = $useradd->input('email');
        $sex = $useradd->input('sex');
        $status = $useradd->input('status');
        $utime = date("Y年m月d日 H时i分s秒");
//        dd($phone, $pwd, $email, $sex, $status, $img, $utime);
        $cla = DB::table('user')->where('phone',$phone)->first();
        if ($cla){
            return back()->with('error','手机号有重复');
        }

        // 移动文件到指定位置

        $path = './uploads/' . date('Y/m/d');
        $name = date('Ymd') . uniqid();
        $ext = $useradd->file('img')->getClientOriginalExtension();
        $filename = $name . '.' . $ext;

        $useradd->file('img')->move($path, $filename);
        $img = $filename;

        DB::insert('insert into user (`phone`,`pwd`,`email`,`sex`,`status`,`img`,`utime`) values(?,?,?,?,?,?,?)',["$phone", "$pwd", "$email", "$sex", "$status", "$img", "$utime"]);
        $data = DB::table('user')->get();
        return redirect('admin/prompt')->with(['message' => '添加成功！', 'url' => '/admin/user', 'jumpTime' => 1, 'status'=> true]);
    }
}
