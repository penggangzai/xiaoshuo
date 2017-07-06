<?php

namespace App\Http\Controllers\Home\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    //添加书籍路由
    public function add(Request $request,$id)
    {
        $list = DB::table('user_book')->where('bid',$id)->select('uid')->get();
        //判断是不是收藏咯此书籍
        if (!empty($list)) {
            if ( !empty($list[0])) {
                if ($_SESSION['home']['id'] == $list[0]->uid) {
                    return back()->with('error','您已经收藏咯此书籍');
                };
            }
        }
        DB::beginTransaction();
        try{
            //执行添加
            $data = DB::table('user_book')->insert(['bid'=>$id,'uid'=>$_SESSION['home']['id']]);
            $count = DB::table('user_book')->where('bid',$id)->count();
//            dd($count);
            $data = DB::table('book')->where('id',$id)->update(['subscribe'=>$count]);
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
        }

        if ($data) {
            return back()->with('error','收藏书籍成功');
        } else {
            return back()->with('error','收藏书籍失败');
        }
    }
    //加载个人收藏页面
    public function index(Request $request)
    {
        $data = DB::table('book')
            ->join('user_book','user_book.bid','=','book.id')
            ->join('user','user.id','=','user_book.uid')
            ->join('chapter','book.id','=','chapter.bid')
            ->join('class','class.id','=','book.cid')
            ->where('user.id','=',$_SESSION['home']['id'])
            ->select('book.bookname','chapter.uptime','class.name','book.id')
            ->distinct()
            ->get();
        foreach ($data as $v){
            $max[$v->id] = DB::table('chapter')->where('bid',$v->id)->count();
            $title[$v->id] = DB::table('chapter')->where('bid',$v->id)->
            where('tid',$max[$v->id])->select('title')->get();
        }
        foreach ($data as $v) {
            $list[$v->id]['bookname']= $v->bookname;
            $list[$v->id]['name'] = $v->name;
            $list[$v->id]['uptime'] = $v->uptime;
            foreach ($max as $k => $val) {
                if($v->id == $k) {
                    $list[$v->id]['count'] = $val;
                }
            }
            foreach ($title as $key =>$val1) {
                if ( $v->id == $key) {
                    $list[$v->id]['title'] = $val1[0]->title;
                }
            }
        }
        if (empty($list)) {
            $list = '';
        }
        return view('home.member.collection',['data'=>$list]);
    }
    //执行删除收藏书籍
    public function del(Request $request,$id)
    {
//        dd($id);
        //执行删除语句
        $list = DB::table('user_book')->where('uid',$_SESSION['home']['id'])->where('bid',$id)->delete();
        //判断是不是删除成功
        if ($list > 0) {
            return back()->with('error', '删除成功');
        } else {
            return back()->with('error', '稍后再试试');

        }

    }

    //图片修改
    public function img(Request $request)
    {
        $data = $request->only('icon','id');
        if (empty($data)) {
            return back()->with('error','您没有数据');
        }
        $result  = DB::table('user')->where('id',$data['id'])->update(['icon'=>$data['icon']]);

//        dd($result);
    if ($result > 0) {
        return back();
    }
    return back()->with('error','请稍后再试试');
    }
}
