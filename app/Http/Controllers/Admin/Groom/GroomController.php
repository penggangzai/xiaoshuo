<?php

namespace App\Http\Controllers\Admin\Groom;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GroomController extends Controller
{
    public function addindex()
    {
       return view('admin/groom/groom');
    }

    public function add(Request $request)
    {
        $data = $request->only('gname');
        $data['time'] = date('Y-m-d');
        $id = DB::table('groom')->insertGetId($data);
        if ($id) {
            return back()->with(['error'=>'添加成功!','success'=>'success']);

        } else {
            return back()->with(['error'=>'添加失败!','success'=>'warning']);

        }
    }

    public function lis()
    {
        $list= DB::table('groom')->get();
        return view('admin.groom.groomlist', ['list' => $list]);
    }
    // 推荐详情页面
    public function bimg($id)
    {
        $list = DB::table('groom_book')->where('brid',$id)->paginate(4);
        return view('admin/groom/groomimg', ['id'=>$id, 'list'=>$list]);
    }
    //推荐按书名添加
    public function biadd(Request $request)
    {
        $data = $request->only('bookname', 'brid');
        if (!$data['bookname']){
            return back()->with(['error'=>'不能为空!','success'=>'warning']);

        }
        $a = DB::table('groom_book')
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
            $id = DB::table('groom_book')->insertGetId($data);

        }

        if ($id) {
            return back()->with(['error'=>'添加成功!','success'=>'success']);

        } else {
            return back()->with(['error'=>'添加失败!','success'=>'warning']);

        }

    }

    public function face($id)
    {
        DB::table('groom')->update(['face'=>'2']);
        DB::table('groom')->where('id',$id)->update(['face'=>'1']);
        return back();
    }
    // 推荐单张删除
    public function del($id)
    {
        //执行删除成功返回影响行数
        $result = DB::table('groom_book')->where('id', $id)->delete();
        //判断影响行数是否大于0
        if ($result > 0) {
            $info = true;
        } else {
            $info = false;
        }
        return response()->json($info);
    }
    // 推荐组删除
    public function dels($id)
    {
        //执行删除成功返回影响行数
        //事务回滚
        DB::beginTransaction();
        try{
            DB::table('groom_book')->where('brid', $id)->delete();
            $result = DB::table('groom')->where('id', $id)->delete();
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
