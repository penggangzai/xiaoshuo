<?php

namespace App\Http\Controllers\Admin\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserdeleteController extends Controller
{
    public function delete($id)
    {
        $sql = "select `img` from user where id='$id'";
        $resultt = DB::select($sql);
        $filenamee = $resultt['0']->img;

        if(!empty($filenamee)){
            $url = 'uploads/';
            $url .= substr($filenamee, 0, 4).'/';
            $url .= substr($filenamee, 4, 2).'/';
            $url .= substr($filenamee, 6, 2).'/';

            $imgy = $url.$filenamee;

            unlink($imgy);
        }


        $result = DB::delete('delete from user where id = ?', [$id]);

        if ($result > 0 ) {
            $info = true;
        } else {
            $info = false;
        }

        return response()->json($info);
    }


    public function statejy($id)
    {
        $info = DB::update('update user set status = ? where id = ?',[2,$id]);
        return response()->json($info);
    }

    public function statejh($id)
    {
        $info = DB::update('update user set status = ? where id = ?',[1,$id]);
        return response()->json($info);
    }

}