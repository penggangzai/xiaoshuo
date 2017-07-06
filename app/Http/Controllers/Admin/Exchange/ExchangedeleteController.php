<?php

namespace App\Http\Controllers\Admin\Exchange;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ExchangedeleteController extends Controller
{
    public function delete($id)
    {
        $result = DB::delete('delete from exchange where id = ?', [$id]);

        if ($result > 0 ) {
            $info = true;
        } else {
            $info = false;
        }

        return response()->json($info);
    }


    public function statejy($id)
    {
        $info = DB::update('update exchange set status = ? where id = ?',[2,$id]);
        return response()->json($info);
    }

    public function statejh($id)
    {
        $info = DB::update('update exchange set status = ? where id = ?',[1,$id]);
        return response()->json($info);
    }

}