<?php

namespace App\Http\Controllers\Admin\Commentt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommentdeleteController extends Controller
{

    public function statejy($id)
    {
        $info = DB::update('update append set status = ? where id = ?',[2,$id]);
        return response()->json($info);
    }

    public function statejh($id)
    {
        $info = DB::update('update append set status = ? where id = ?',[1,$id]);
        return response()->json($info);
    }

}