<?php

namespace App\Http\Controllers\admin\Commentt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    //加载前台用户列表页面
    public function index()
    {
        $data = DB::table('append')->get();
        return view('admin/commentt/comment', ['data' => $data]);
    }
}
