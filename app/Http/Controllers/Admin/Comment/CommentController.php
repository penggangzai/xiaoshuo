<?php

namespace App\Http\Controllers\admin\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    //加载前台用户列表页面
    public function index()
    {
        $data = DB::table('comment')->get();
        return view('admin/comment/comment', ['data' => $data]);
    }
}
