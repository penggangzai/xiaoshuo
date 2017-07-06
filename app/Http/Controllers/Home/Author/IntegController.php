<?php

namespace App\Http\Controllers\Home\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IntegController extends Controller
{

    protected $integ;

    public function __construct()
    {
        $data = DB::table('autor_info')->where('aid',$_SESSION['id'])->value('integral');
        if (empty($data)) {
            $data = 0;
        }
        //存入属性中
        $this->integ = $data;
    }

    //进入积分首页
    public function index($id)
    {
        $list = DB::table('good')->where('status','1')->select()->get();
        return view('home.author.integ',['data'=>$this->integ,'list'=>$list]);
    }
    //进行兑现
    public function change($id,$gid)
    {
        if ($id > $this->integ) {
            return back()->with('error','您的积分不足');
        };
        $integ =  $this->integ - $id;

        DB::beginTransaction();
        try{
             DB::table('autor_info')->where('aid','=',$_SESSION['id'])->update(['integral'=>$integ]);
            $result1 = DB::table('good_autor')->insert(['gid'=>$gid,'aid'=>$_SESSION['id']]);
//            dd($result1);
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
        }

        if ($result1 > 0 ) {
            return back()->with('error','兑换成功');
        }
            return back()->with('error','兑换不成功');
    }
    //进入我的物品页面
    public function good($id)
    {
        $data = DB::table('good_autor')
            ->join('good','good.id','=','good_autor.gid')
            ->where('good_autor.aid','=',$id)
            ->select('good.goodname','good.icon','good.intro','good_autor.id')
            ->get();
        return view('home.author.good',['data'=>$data]);
    }

    //执行使用兑换物品
    public function gooddel($id)
    {
//        dd($id);
        DB::beginTransaction();
        try{
            $goodname = DB::table('good_autor')
                ->join('good','good.id','=','good_autor.gid')
                ->where('good_autor.id','=',$id)
                ->select('goodname')
                ->get();
            $id = DB::table('good_autor')->where('id',$id)->delete();
                DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
        }
        if ( $id ) {
            return back()->with('error','您已经使用'.$goodname[0]->goodname);
        }
            return back()->with('error','请稍后再试试');
    }
}
