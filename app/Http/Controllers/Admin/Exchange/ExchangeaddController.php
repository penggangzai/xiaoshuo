<?php

namespace App\Http\Controllers\admin\Exchange;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Intervention\Image\Facades\Image;

class ExchangeaddController extends Controller
{
    // 加载用户添加页面
    public function index()
    {
        return view('admin/exchange/exchangeadd');
    }

    public function add(Request $useradd)
    {

        $exchange = $useradd->input('exchange');
        $domain = $useradd->input('domain');
        $status = $useradd->input('status');

        $cla = DB::table('exchange')->where('exchange',$exchange)->first();
        if ($cla){
            return back()->with('error','友情链接名称重复');
        }

        DB::insert('insert into exchange (`exchange`,`domain`,`status`) values(?,?,?)',["$exchange", "$domain", "$status"]);
        $data = DB::table('exchange')->get();
        return redirect('admin/prompt')->with(['message' => '添加成功！', 'url' => '/exchange/exchange', 'jumpTime' => 1, 'status'=> true]);
    }
}
