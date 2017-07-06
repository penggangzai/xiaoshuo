<?php

namespace App\Http\Controllers\admin\Commentt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommentselectController extends Controller
{
    public function select($id){
        $data = DB::select('select * from append where id = ?',[$id]);

        return view('admin/commentt/commentselect', ['data' => $data]);
    }
}
