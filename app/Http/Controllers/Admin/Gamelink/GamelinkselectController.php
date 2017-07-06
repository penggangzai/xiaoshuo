<?php

namespace App\Http\Controllers\admin\Gamelink;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GamelinkselectController extends Controller
{
    public function select($id){
        $data = DB::select('select * from gamelink where id = ?',[$id]);

        return view('admin/gamelink/gamelinkselect', ['data' => $data]);
    }
}
