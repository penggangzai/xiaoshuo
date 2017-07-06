<?php

namespace App\Http\Controllers\admin\Exchange;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ExchangemodifyController extends Controller
{
    public function modify(Request $modify){

        $id = $modify->input('id');
        $exchange = $modify->input('exchange');
        $domain = $modify->input('domain');
        $status = $modify->input('status');

        DB::table('exchange')
          ->where('id',$id)
          ->update(['exchange'=>$exchange,'domain'=>$domain,'status'=>$status]);

        return redirect('admin/prompt')->with(['message' => '修改成功！', 'url' => '/exchange/exchange', 'jumpTime' => 1, 'status'=> true]);
    }


    public function singledata($id){
        $data = DB::select('select * from exchange where id = ?',[$id]);
//        dd($data);
        return view('admin/exchange/exchangemodify', ['data' => $data]);
    }
}
