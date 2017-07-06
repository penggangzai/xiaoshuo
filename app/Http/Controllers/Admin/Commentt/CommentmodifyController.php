<?php

namespace App\Http\Controllers\admin\Commentt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class CommentmodifyController extends Controller
{
    public function modify(Request $modify){

        $id = $modify->input('id');
        $comments = $modify->input('comments');
        $status = $modify->input('status');
        DB::table('append')
            ->where('id',$id)
            ->update(['comments'=>$comments,'status'=>$status]);

        return redirect('admin/prompt')->with(['message' => '修改成功！', 'url' => '/comment/commentt', 'jumpTime' => 1, 'status'=> true]);
    }


    public function singledata($id){
        $data = DB::select('select * from append where id = ?',[$id]);
//        dd($data);
        return view('admin/commentt/commentmodify', ['data' => $data]);
    }
}
