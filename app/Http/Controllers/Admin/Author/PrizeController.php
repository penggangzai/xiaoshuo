<?php

namespace App\Http\Controllers\Admin\Author;

use App\Http\Model\ImgUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PrizeController extends Controller
{
    public function index()
    {
        $data = DB::table('good')->select()->get();

        return  view('admin.prize.prizelist',['list'=>$data]);
    }
    //加载添加页面
    public function add()
    {
        return view('admin.prize.prizeadd');
    }

    //执行添加
    public function insert(Request $request)
    {
        //判断是不是
        $data = $request->only('goodname','price','status','intro');
       $price = '/^[0-9]*$/';
       $goodname = "/^[\x{4E00}-\x{9FA5}A-Za-z0-9_]{1,15}$/u";
       if (!preg_match($goodname,$data['goodname'])) {
           return back()->with(['error'=>'名称和简介不能出现特殊号!','success'=>'warning']);
       }
        if (!preg_match($goodname,$data['intro'])) {
            return back()->with(['error'=>'名称和简介不能出现特殊号1!','success'=>'warning']);
        }
        if (!preg_match($price,$data['price'])) {
            return back()->with(['error'=>'价格不能为负数!','success'=>'warning']);
        }
        if ( !empty($request->file())) {
            $list = new ImgUp();
            $img = $list->upimg($request);
            if (!$img) {
                return back()->with(['error'=>'图片过于太大','success'=>'warning']);
            }
            $data['icon'] = $img;
        } else {
           $data['icon'] = '';
        }
        $id = DB::table('good')->insertGetId($data);
       if ($id > 0 ) {
            return redirect('admin/prize/index')->with(['error'=>'添加成功!','success'=>'success']);
       } else {
           return back()->with(['error'=>'请在试一下','success'=>'warning']);
       }
    }
    //删除
    public function del($id)
    {
//            $img = $request->only('icon');
        $img = DB::table('good')->where('id',$id)->value('icon');
        $result = DB::table('good')->where('id','=',$id)->delete();

        if ($result) {
            if (!empty($img)) {
                $a = unlink($img);
            }
            return back()->with(['error'=>'删除成功!','success'=>'success']);
        }
        return back()->with(['error'=>'等下再试试!','success'=>'warning']);


    }
    //加载改的页面
    public function edit($id)
    {
//       dd(456);

        $data = DB::table('good')->where('id','=',$id)->first();
        return view('admin.prize.prizeedit',['data'=>$data]);
    }
    //执行编辑方法
    public function save(Request $request)
    {
        $data = $request->only('status','intro','goodname','price','id');
//        dd($data);

        $result = DB::table('good')->where('id',$data['id'])->update($data);
        if ($result > 0 ){
            return redirect('admin/prize/index')->with(['error'=>'修改成功!','success'=>'success']);
        }
        return back()->with(['error'=>'修改失败请审核数据!','success'=>'warning']);
    }

}
