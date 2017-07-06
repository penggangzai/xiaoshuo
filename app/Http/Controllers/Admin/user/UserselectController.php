<?php

namespace App\Http\Controllers\admin\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserselectController extends Controller
{
    public function select($id){
        $data = DB::select('select * from user where id = ?',[$id]);

        $sql = "select `img` from user where id='$id'";
        $resultt = DB::select($sql);
        $filenamee = $resultt['0']->img;

        if(empty($filenamee)){
            $imgy = false;
        }else{
            $url = 'uploads/';
            $url .= substr($filenamee, 0, 4).'/';
            $url .= substr($filenamee, 4, 2).'/';
            $url .= substr($filenamee, 6, 2).'/';

            $imgy = $url.$filenamee;
        }

        return view('admin/user/userselect', ['data' => $data , 'imgy' => $imgy]);
    }
}
