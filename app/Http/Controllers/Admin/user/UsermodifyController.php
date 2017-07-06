<?php

namespace App\Http\Controllers\admin\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class UsermodifyController extends Controller
{
    public function modify(Request $modify){
        //  判断是否有文件上传
        if ($modify->hasFile('img')) {
            $file = $modify->File();
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
            $ext = $modify->file('img')->getClientOriginalExtension();
            if (!in_array($ext, array('jpg', 'png', 'jpeg'))) {
//                ('不合法的文件类型');
                return back();
            }

            // 移动文件到指定位置

            $path = './uploads/' . date('Y/m/d');
            $name = date('Ymd') . uniqid();
            $ext = $modify->file('img')->getClientOriginalExtension();
            $filename = $name . '.' . $ext;
            
            $modify->file('img')->move($path, $filename);

            $id = $modify->input('id');
            $sql = "select `img` from user where id='$id'";
            $result = DB::select($sql);
            $filenamee = $result['0']->img;

            if(!empty($filenamee)){
                $url = 'uploads/';
                $url .= substr($filenamee, 0, 4).'/';
                $url .= substr($filenamee, 4, 2).'/';
                $url .= substr($filenamee, 6, 2).'/';

                $imgy = $url.$filenamee;

                unlink($imgy);
            }



            $phone = $modify->input('phone');
            $email = $modify->input('email');
            $sex = $modify->input('sex');
            $status = $modify->input('status');
            $img = $filename;
    //        dd($id,$phone,$pwd,$email,$status);
            DB::table('user')
              ->where('id',$id)
              ->update(['phone'=>$phone,'email'=>$email,'sex'=>$sex,'status'=>$status,'img'=>$img]);
//            $data = DB::table('user')->get();
//            return view('admin/user/user', ['data' => $data]);
            return redirect('admin/prompt')->with(['message' => '修改成功！', 'url' => '/admin/user', 'jumpTime' => 1, 'status'=> true]);
        }


        $id = $modify->input('id');
        $sql = "select `img` from user where id='$id'";
        $result = DB::select($sql);

        $phone = $modify->input('phone');
        $email = $modify->input('email');
        $sex = $modify->input('sex');
        $status = $modify->input('status');
        $img = $result['0']->img;
        DB::table('user')
            ->where('id',$id)
            ->update(['phone'=>$phone,'email'=>$email,'sex'=>$sex,'status'=>$status,'img'=>$img]);

//      $data = DB::table('user')->get();
//      return view('admin/user/user', ['data' => $data]);
        return redirect('admin/prompt')->with(['message' => '修改成功！', 'url' => '/admin/user', 'jumpTime' => 1, 'status'=> true]);
    }


    public function singledata($id){
        $data = DB::select('select * from user where id = ?',[$id]);
//        dd($data);
        return view('admin/user/usermodify', ['data' => $data]);
    }
}
