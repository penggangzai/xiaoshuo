<?php

namespace App\Http\Controllers\Admin\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{
    public $list;

    public function __construct()
    {
        $sql = 'select `id`, `name`, `path`, concat(path, id, ",") as px
           from  `class`
           order by px
           ';
        // 查询所有分类;
        $list = DB::select($sql);
        $this->list = $list;
    }

    // 加载添加书名方法
    public function index()
    {

        // 加载添加页面
        $list = $this->list;
        return view('admin/book/bookadd', ['list' => $list]);
    }

    //执行添加书名方法
    public function add(Request $request)
    {
        //接收数据取出指定字段
        $data = $request->only(['bookname', 'wirter', 'cid', 'intro', 'display', 'status']);
        // 判断书名是否为空
        foreach ($data as $k => $v) {
            if (!$v && $k != 'intro') {
                return back()->with(['error'=>'请输入完整信息！','success'=>'warning']);

            }
        }
        // 查看book表中是否存在改书名
        $cla = DB::table('book')->where('bookname', $data['bookname'])->first();

        if ($cla) {
            // 如果存在跳转回添加页面
            return back()->with(['error'=>'该书名已存在！','success'=>'warning']);

        } else {
            $data['time'] = date('Y-m-d');
            //执行添加
            $id = DB::table('book')->insertGetId($data);
        }

        if ($id) {
            return back()->with(['error'=>'添加成功!','success'=>'success']);

        } else {

            return back()->with(['error'=>'添加失败!','success'=>'warning']);

        }
    }

    // 添加书籍图片方法
    public function img(Request $request)
    {
        if (!$request->File()) {

            return back()->with(['error'=>'请选择图片！','success'=>'warning']);
        }

        $data = $request->only('bid');
        $i = DB::table('book_img')->where('bid', $data['bid'])->get(['img']);
        if(!empty($i['0'])){
            return back()->with(['error'=>'请先删除原图片!','success'=>'warning']);
        }

        $file = $request->File();
        $key = key($file);
        switch ($_FILES[$key]['error']) {
            case '1':
                return back()->with('error', '文件大小超过2M！');
                break;
            case '2':
                return back()->with('error', '上传失败！');
                break;
            case '3':
                return back()->with('error', '上传失败,请查看网线是否连接好！');
                break;
            case '4':
                return back()->with('error', '请选择图片！');
                break;
            case '6':
                return back()->with('error', '上传失败！');
                break;
            case '7':
                return back()->with('error', '上传失败！');
                break;
        }
        if (!is_uploaded_file($_FILES[$key]['tmp_name'])) {
            return back()->with('error', '上传失败');
        }
//         判断文件类型
        $ext = $request->file('img')->getClientOriginalExtension();
        if (!in_array($ext, array('jpg', 'png', 'jpeg'))) {
            return back()->with('error', '上传失败文件类型不合法');
        }

        // 移动文件到指定位置  处理 路径/名字/后缀
        $path = './bookimg/imgs/' . date('Y/m/d');
        $name = date('Ymd') . uniqid();
        $filename = $name . '.' . $ext;
        $img = $request->file('img')->move($path, $filename);

        $data['img'] = $filename;
        $data['url'] = $path . '/' . $filename;
        if ($img) {
            $id = DB::table('book_img')->insertGetId($data);
        }
        if ($id) {
            return back()->with(['error'=>'上传成功!','success'=>'success']);
        }

    }

    public function delimg($id)
    {

        $url = DB::table('book_img')->where('bid', $id)->get(['url']);
        
        //执行删除成功返回影响行数
        if (!empty($url['0'])){
            //判断文件是否存在
            $file = is_file($url['0']->url);

            if($file){
            //执行文件删除    
            unlink($url['0']->url);
            }

         //删除图片名
        $result = DB::table('book_img')->where('bid', $id)->delete();
        $info = true;
        
        }else{

            $info = false;
         }
        return response()->json($info);
    }









}
