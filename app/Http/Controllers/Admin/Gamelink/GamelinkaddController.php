<?php

namespace App\Http\Controllers\admin\Gamelink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Intervention\Image\Facades\Image;

class GamelinkaddController extends Controller
{
    // 加载用户添加页面
    public function index()
    {
        return view('admin/gamelink/gamelinkadd');
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

        $domain = $useradd->input('domain');
        $namee = $useradd->input('name');
        $status = $useradd->input('status');

        $cla = DB::table('gamelink')->where('name',$name)->first();
        if ($cla){
            return back()->with('error','名字重复');
        }

        // 移动文件到指定位置

        $path = './uploads/' . date('Y/m/d');
        $name = date('Ymd') . uniqid();
        $ext = $useradd->file('img')->getClientOriginalExtension();
        $filename = $name . '.' . $ext;
        $useradd->file('img')->move($path, $filename);
        $img = $path.'/'.$filename;
//        dd($img);die;

        DB::insert('insert into gamelink (`domain`,`name`,`status`,`img`) values(?,?,?,?)',["$domain", "$namee", "$status", "$img"]);
        $data = DB::table('gamelink')->get();
        return redirect('admin/prompt')->with(['message' => '添加成功！', 'url' => '/gamelink/gamelink', 'jumpTime' => 1, 'status'=> true]);
    }
}
