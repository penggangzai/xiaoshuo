<?php

namespace App\Http\Controllers\Home\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PinController extends Controller
{
    public function index($sid, $uid, $score)
    {
        DB::insert('insert into management (`sid`,`uid`,`score`) values(?,?,?)',["$sid", "$uid", "$score"]);
        $data = DB::table('management')->get();
        return response()->json($data);
    }
}
