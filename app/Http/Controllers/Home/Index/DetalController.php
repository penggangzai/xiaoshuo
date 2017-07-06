<?php

namespace App\Http\Controllers\Home\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DetalController extends Controller
{
    public function indexx($id,$bookname)
    {
        $comd = DB::table('comment')
            ->join('user','comment.uid','=','user.id')
            ->where('comment.id','=',$id)
            ->get(['comment.comment','user.img','user.phone','comment.agree','comment.id']);

        if(!empty($_SESSION['home'])){
            $uid = $_SESSION['home']['id'];
        }else{
            $uid = false;
        }

        $comdd = DB::table('append')
            ->join('user','append.phone','=','user.phone')
            ->where('comid','=',$id)
            ->where('append.status','=',1)
            ->get(['append.comments','user.img','user.phone']);

        $list = DB::table('class')->where('pid','0')->where('display', '1')->get();
        //查询二级分类
        $list_s = DB::table('class')->where('pid','>','0')->paginate(8);


        return view('home/detailss', [
            'list'=>$list,
            'list_s'=>$list_s,
            'comd'=>$comd,
            'bookname'=>$bookname,
            'uid'=>$uid,
            'comid'=>$id,
            'comdd'=>$comdd
        ]);
    }
}
