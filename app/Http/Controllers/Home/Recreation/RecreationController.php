<?php

namespace App\Http\Controllers\Home\Recreation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class RecreationController extends Controller
{

    public function deng()
    {
        $data = DB::table('gamelink')->get();
        return view('home/recreation', ['data' => $data]);
    }
}