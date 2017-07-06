<?php

namespace App\Http\Controllers\Home\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ChapterController extends Controller
{
    //添加章节页面
    public function add(Request $request,$id)
    {
        //查询当前最大章节
        $list = DB::table('chapter')->where('bid', $id)->orderBy('tid', 'desc')->get(['tid']);
        $bookname = DB::table('book')->where('id', $id)->get(['bookname']);

        // 如果为空给1
        if (empty($list['0'])) {
            $list = '1';
        } else {

            $list = ($list['0']->tid) + 1;
        }
        if (empty($bookname[0])) {
            return back()->with('error','你估计动咯数据吧');
        }
//        dd($id);
        return view('home.author.addchapter',['list'=>$list,'bid'=>$id,'book'=>$bookname[0]]);
    }
    //执行添加
    public function insert(Request $request)
    {
        //接收数据取出指定字段
        $data = $request->only(['bid', 'tid', 'title', 'contant','status']);
        // 判断信息是否完整
        foreach ($data as $k => $v) {
            if (!$v) {
                return back()->with('error', '请输入完整信息！');
            }
        }

        $count = strlen($data['contant']);
        // 写入添加时间
        $data['uptime'] = date('Y-m-d H:i:s');
        $data['count']  = floor($count/3);
        //把字数转换为积分
        $integral = $data['count'] /100;
        //事务的回滚
        DB::beginTransaction();
        try{
            //执行添加
            $id = DB::table('chapter')->insertGetId($data);
            $aid = DB::table('book')->where('id',$data['bid'])->value('aid');
            //修改添加积分
            $aidid = DB::table('autor_info')->where('aid',$aid)->update(['integral'=>$integral]);
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
        }
//        dd($id);
        if ($id) {

            return redirect('/home/author/work/'.$_SESSION['id'])->with('error','上传成功');
        } else {
            return back()->with('error', '上传失败！');
        }
    }
    //加载已传页面
    public function end(Request $request,$id)
    {
        $data = DB::table('chapter')->where('bid','=',$id)->select('tid','title','uptime','count','status')->get();
        if (empty($data[0])) {
            return back()->with('error','您还没有上传章节');
        }
        return view('home.author.endchapter',['data'=>$data]);
    }
}
