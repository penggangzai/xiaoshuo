<?php

namespace App\Http\Controllers\admin\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class CommentmodifyController extends Controller
{
    public function modify(Request $modify){

        $id = $modify->input('id');
        $agree = $modify->input('agree');
        $comment = $modify->input('comment');
        $status = $modify->input('status');
        DB::table('comment')
            ->where('id',$id)
            ->update(['agree'=>$agree,'comment'=>$comment,'status'=>$status]);

        return redirect('admin/prompt')->with(['message' => '修改成功！', 'url' => '/comment/comment', 'jumpTime' => 1, 'status'=> true]);
    }


    public function singledata($id){
        $data = DB::select('select * from comment where id = ?',[$id]);
//        dd($data);
        return view('admin/comment/commentmodify', ['data' => $data]);
    }
}
