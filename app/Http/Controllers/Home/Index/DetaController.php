<?php

namespace App\Http\Controllers\Home\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DetaController extends Controller
{
    public function index($id)
    {
        // 查询一级分类
        $list = DB::table('class')->where('pid', '0')->where('display','1')->get();
        //查询二级分类
        $list_s = DB::table('class')->where('pid', '>', '0')->where('display','1')->get();
        // 查询对应书籍
        $book = DB::table('book')
            ->where('book.id', $id)
            ->join('class','class.id','=','book.cid')
            ->join('book_img','book.id','=','book_img.bid')
            ->get(['book.id','name','bookname','url','wirter','intro','book.status']);

        // 查询评论功能
        $user = DB::table('comment')
            ->join('user','comment.uid','=','user.id')
            ->where('comment.bid','=',$id)
            ->where('comment.status','=',1)
            ->get(['comment.comment','user.img','user.phone','comment.agree','comment.id']);
        if(!empty($_SESSION['home'])){
            $uid = $_SESSION['home']['id'];
        }else{
            $uid = false;
        }

        $bid = $id;
        $userr = [];
        foreach($user as $k=>$v){
            $userr[$k]['comment'] = $v->comment;
            $userr[$k]['img'] = $v->img;
            $userr[$k]['phone'] = $v->phone;
            $userr[$k]['agree'] = $v->agree;
            $userr[$k]['id'] = $v->id;
            $sl = DB::table('append')
                ->where('append.comid', '=', $v->id)
                ->where('append.status', '=', 1)
                ->count();
            $userr[$k]['sl'] = $sl;
        }

        $sls = DB::table('management')
            ->where('sid', '=', $id)
            ->where('uid', '=', $uid)
            ->count();

        $chasl = DB::table('management')
            ->where('sid', '=', $id)
            ->count();

        if ($sls){
            $management = DB::table('management')
                ->where('sid','=',$id)
                ->get(['score']);

            $laoco = 0;
            foreach($management as $k=>$v){
                $laoco += $v->score;
            }

            $laocoo =  $laoco / $chasl;

            DB::table('book')
                ->where('id',$id)
                ->update(['score'=>$laocoo]);

            $paosh = $laocoo;

        }else{
            $paosh = false;
        }



        return view('home/details', [
            'list'=>$list,
            'list_s'=>$list_s,
            'book'=>$book[0],
            'userr'=>$userr,
            'uid'=>$uid,
            'bid'=>$bid,
            'paosh'=>$paosh,
            'chasl'=>$chasl
        ]);
    }

    //点赞状态
    public function status($comid , $uid)
    {
        // 查询点赞多少
        $comment = DB::table('comment')
            ->where('id','=',$comid)
            ->get(['agree']);

        $dataa = DB::table('commcount')
            ->where('comid', '=', $comid)
            ->where('uid', '=', $uid)
            ->count();

        if(!$dataa){
            DB::insert('insert into commcount (`comid`,`uid`) values(?,?)',["$comid", "$uid"]);
            $agree = $comment['0']->agree + 1;
            DB::table('comment')
                ->where('id',$comid)
                ->update(['agree'=>$agree]);
            $data = $agree;
            return response()->json($data);
        }else{
            $ling = DB::table('commcount')
                ->where('comid','=',$comid)
                ->where('uid','=',$uid)
                ->get(['awesome']);
            $zgt = $ling['0']->awesome;
            if($zgt == 1){
                $agree = $comment['0']->agree + 1;
                DB::table('commcount')
                    ->where('comid','=',$comid)
                    ->where('uid','=',$uid)
                    ->update(['awesome'=> 2]);
                DB::table('comment')
                    ->where('id',$comid)
                    ->update(['agree'=>$agree]);
                $data = $agree;
                return response()->json($data);
            }else{
                $agree = $comment['0']->agree - 1;
                DB::table('commcount')
                    ->where('comid','=',$comid)
                    ->where('uid','=',$uid)
                    ->update(['awesome'=> 1]);
                DB::table('comment')
                    ->where('id',$comid)
                    ->update(['agree'=>$agree]);
                $data = $agree;
                return response()->json($data);
            }
        }
    }
}
