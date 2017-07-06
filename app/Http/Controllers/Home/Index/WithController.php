<?php

namespace App\Http\Controllers\Home\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WithController extends Controller
{
    public function with($id, $tid='1')
    {
        //判断章节是否大于2并且用户是否等入

        if ($tid > 2 && empty($_SESSION['home']['id'])){
            return back()->with(['error'=>'改章节为VIP章节请先登入!','url'=>url('home/entryy')]);
        }

        if ($tid <= 0){
            $tid = '1';
        }
        // 查询书名
        $name=DB::table('book')->where('id',$id)->get(['bookname','wirter']);
        // 查询对应章节
        $list = DB::table('chapter')
            ->where('bid', $id)
            ->where('tid', $tid)
            ->where('status','1')
            ->get(['contant','title','uptime','status']);
        // 判断是否有章节数据
        if (!empty($list[0])){
            return view('home.with.index',['list'=>$list[0], 'id'=>$id, 'tid'=>$tid, 'name'=>$name['0']]);
        } else {
            //没有数据跳转到列表页
            return redirect('home/listchapter/'.$id);
        }
    }
}


