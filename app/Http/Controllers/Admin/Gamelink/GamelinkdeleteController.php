<?php

namespace App\Http\Controllers\Admin\Gamelink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GamelinkdeleteController extends Controller
{
    public function delete($id)
    {
        $sql = "select `img` from gamelink where id='$id'";
        $resultt = DB::select($sql);
        $filenamee = $resultt['0']->img;


        unlink($filenamee);

        $result = DB::delete('delete from gamelink where id = ?', [$id]);

        if ($result > 0 ) {
            $info = true;
        } else {
            $info = false;
        }

        return response()->json($info);
    }


    public function statejy($id)
    {
        $info = DB::update('update gamelink set status = ? where id = ?',[2,$id]);
        return response()->json($info);
    }

    public function statejh($id)
    {
        $info = DB::update('update gamelink set status = ? where id = ?',[1,$id]);
        return response()->json($info);
    }

}