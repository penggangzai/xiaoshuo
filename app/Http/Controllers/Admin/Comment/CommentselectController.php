<?php

namespace App\Http\Controllers\admin\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommentselectController extends Controller
{
    public function select($id){
        $data = DB::select('select * from comment where id = ?',[$id]);

        return view('admin/comment/commentselect', ['data' => $data]);
    }
}
