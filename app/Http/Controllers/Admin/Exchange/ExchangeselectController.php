<?php

namespace App\Http\Controllers\admin\Exchange;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ExchangeselectController extends Controller
{
    public function select($id){
        $data = DB::select('select * from exchange where id = ?',[$id]);

        return view('admin/exchange/exchangeselect', ['data' => $data]);
    }
}
