<?php
namespace App\Http\Model;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ImgUp extends Controller
{
    // 添加书籍图片方法
    public function upimg(Request $request)
    {
        $file = $request->File();
        $key = key($file);
        switch ($_FILES[$key]['error']) {
            case '1':
                return $data['url'] = false;
                break;
            case '2':
                return $data['url'] = false;
                break;
            case '3':
                return $data['url'] = false;
                break;
            case '4':
                return $data['url'] = false;
                break;
            case '6':
                return $data['url'] = false;
                break;
            case '7':
                return $data['url'] = false;
                break;
        }
        if (!is_uploaded_file($_FILES[$key]['tmp_name'])) {
            return $data['url'] = false;
        }

//         判断文件类型
        $ext = $request->file('img')->getClientOriginalExtension();
        if (!in_array($ext, array('jpg', 'png', 'jpeg'))) {
            return $data['url'] = false;
        }

        // 移动文件到指定位置  处理 路径/名字/后缀
        $path = './bookimg/imgs/' . date('Y/m/d');
        $name = date('Ymd') . uniqid();
        $filename = $name . '.' . $ext;
        $img = $request->file('img')->move($path, $filename);
        $data = $request->only('bid');
        $data['img'] = $filename;
        $data['url'] = $path.'/'.$filename;
//        dd($data['url']);
//        dd($data['url']);
        return $data['url'];
    }
}