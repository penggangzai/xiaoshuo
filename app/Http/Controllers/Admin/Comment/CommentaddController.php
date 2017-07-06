<?php

namespace App\Http\Controllers\admin\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class CommentaddController extends Controller
{
    // 评论添加
    public function add(Request $request)
    {

        $bid = $request->input('bid');
        $uid = $request->input('uid');
        $comment = $request->input('comment');
//        var_dump($request->all());
//        dd($bid,$uid,$comment);die;

        DB::insert('insert into comment (`bid`,`uid`,`comment`) values(?,?,?)',["$bid", "$uid", "$comment"]);
        $data = DB::table('comment')->get();
        return back()->with('error','评论成功');
    }

    // 追加评论添加
    public function addx(Request $request)
    {

        $comid = $request->input('comid');
        $uid = $request->input('uid');
        $comments = $request->input('comments');
//        var_dump($request->all());
//        dd($bid,$uid,$comment);die;
        $phone = $_SESSION['home']['phone'];

        DB::insert('insert into append (`comid`,`uid`,`comments`,`phone`) values(?,?,?,?)',["$comid", "$uid", "$comments", "$phone"]);
        $data = DB::table('comment')->get();
        return back()->with('error','评论成功');
    }
}
