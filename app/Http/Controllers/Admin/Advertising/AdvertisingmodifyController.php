<?php

namespace App\Http\Controllers\admin\Advertising;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class AdvertisingmodifyController extends Controller
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

            $path = './poster/' . date('Y/m/d');
            $name = date('Ymd') . uniqid();
            $ext = $modify->file('img')->getClientOriginalExtension();
            $filename = $name . '.' . $ext;
//            $modify->file('img')->move($path, $filename);
            // 130

            $modify->file('img')->move($path, $filename);

            $id = $modify->input('id');
            $sql = "select `img` from advertising where id='$id'";
            $result = DB::select($sql);
            $filenamee = $result['0']->img;

            if(!empty($filenamee)){
                $url = substr($filenamee, 0, 19);
                $urll = substr($filenamee, 20);

                $imgy = $url.'/'.$urll;

//                var_dump($imgy);die;
                unlink($imgy);
            }


            $domain = $modify->input('domain');
            $img = $path . '/' . $filename;
    //        dd($id,$phone,$pwd,$email,$status);
            DB::table('advertising')
              ->where('id',$id)
              ->update(['img'=>$img,'domain'=>$domain]);
//            $data = DB::table('user')->get();
//            return view('admin/user/user', ['data' => $data]);
            return redirect('admin/prompt')->with(['message' => '修改成功！', 'url' => '/poster/poster', 'jumpTime' => 1, 'status'=> true]);
        }


        $id = $modify->input('id');
        $sql = "select `img` from advertising where id='$id'";
        $result = DB::select($sql);

        $domain = $modify->input('domain');
        $img = $result['0']->img;
        DB::table('advertising')
            ->where('id',$id)
            ->update(['img'=>$img,'domain'=>$domain]);

//      $data = DB::table('user')->get();
//      return view('admin/user/user', ['data' => $data]);
        return redirect('admin/prompt')->with(['message' => '修改成功！', 'url' => '/poster/poster', 'jumpTime' => 1, 'status'=> true]);
    }


    public function singledata($id){
        $data = DB::select('select * from advertising where id = ?',[$id]);
//        dd($data);
        return view('admin/advertising/advertisingmodify', ['data' => $data]);
    }
}
