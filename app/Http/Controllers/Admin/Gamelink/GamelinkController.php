<?php

namespace App\Http\Controllers\admin\Gamelink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GamelinkController extends Controller
{
    //加载前台用户列表页面
    public function index()
    {
        $data = DB::table('gamelink')->get();
        return view('admin/gamelink/gamelink', ['data' => $data]);
    }
}
