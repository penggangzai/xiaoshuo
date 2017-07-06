<?php

namespace App\Http\Controllers\admin\Exchange;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ExchangeController extends Controller
{
    //加载前台用户列表页面
    public function index()
    {
        $data = DB::table('exchange')->get();
        return view('admin/exchange/exchange', ['data' => $data]);
    }
}
