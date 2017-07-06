<?php

namespace App\Http\Controllers\Admin\Advertising;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdvertisingController extends Controller
{
    //加载前台用户列表页面
    public function index()
    {
        $data = DB::table('advertising')->get();
        return view('admin/advertising/advertising', ['data' => $data]);
    }
}
