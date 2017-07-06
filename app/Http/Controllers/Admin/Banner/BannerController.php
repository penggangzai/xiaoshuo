<?php

namespace App\Http\Controllers\Admin\Banner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    public function addindex()
    {
       return view('admin/banner/banner');
    }

    public function add(Request $request)
    {
        $data = $request->only('bname');
        $id = DB::table('banner')->insertGetId($data);
        if ($id) {
            return back()->with(['error'=>'添加成功!','success'=>'success']);
        } else {
            return back()->with(['error'=>'添加失败!','success'=>'warning']);
        }
    }

    public function lis()
    {
        $list= DB::table('banner')->get();
        return view('admin/banner/bannerlist', ['list' => $list]);
    }
    // 轮播详情页面
    public function bimg($id)
    {
        $list = DB::table('banner_book')->where('brid',$id)->get(['id','bookname','url']);
        return view('admin/banner/bannerimg', ['id'=>$id, 'list'=>$list]);
    }
    //轮播图按书名添加
    public function biadd(Request $request)
    {
        $data = $request->only('bookname', 'brid');
        if (!$data['bookname']){
            return back()->with(['error'=>'不能为空!','success'=>'warning']);
        }
        $a = DB::table('banner_book')
            ->where('brid',$data['brid'])
            ->where('bookname',$data['bookname'])->get();

        if (!empty($a[0])){
            return back()->with(['error'=>'内容已存在!','success'=>'warning']);
        }

        $list = DB::table('book')
            ->join('book_img','book.id','=','book_img.bid')
            ->where('bookname',$data['bookname'])
            ->get(['book.id','wirter','intro', 'url']);
        if(empty($list[0])){
            return back()->with(['error'=>'书名不存在!','success'=>'warning']);
        } else {
            $data['wirter'] = $list[0]->wirter;
            $data['intro'] = $list[0]->intro;
            $data['url'] = $list[0]->url;
            $data['bid'] = $list[0]->id;
            $id = DB::table('banner_book')->insertGetId($data);

        }

        if ($id) {
            return back()->with(['error'=>'添加成功!','success'=>'success']);

        } else {
            return back()->with(['error'=>'添加失败!','success'=>'warning']);

        }

    }

    public function face($id)
    {
        DB::table('banner')->update(['face'=>'2']);
        DB::table('banner')->where('id',$id)->update(['face'=>'1']);
        return back();
    }
    // 轮播图单张删除
    public function del($id)
    {
        //执行删除成功返回影响行数
        $result = DB::table('banner_book')->where('id', $id)->delete();
        //判断影响行数是否大于0
        if ($result > 0) {
            $info = true;
        } else {
            $info = false;
        }
        return response()->json($info);
    }
    // 轮播图组删除
    public function dels($id)
    {
        //执行删除成功返回影响行数
        //事务回滚
        DB::beginTransaction();
        try{
            DB::table('banner_book')->where('brid', $id)->delete();
            $result = DB::table('banner')->where('id', $id)->delete();
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
        }

        //判断影响行数是否大于0
        if ($result > 0) {
            $info = true;
        } else {
            $info = false;
        }
        return response()->json($info);
    }
}
