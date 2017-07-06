<?php

namespace App\Http\Controllers\admin\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //加载前台用户列表页面
    public function index()
    {
        $data = DB::table('user')->get();
        return view('admin/user/user', ['data' => $data]);
    }
}
