<?php

namespace App\Http\Controllers\Admin\Grade;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    //加载前台用户列表页面
    public function index()
    {
        $data = DB::table('book')->orderBy('score', 'desc')->get();
        return view('admin/grade/grade', ['data' => $data]);
    }
}
