<?php

namespace App\Http\Controllers\admin\advertising;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class advertisingselectController extends Controller
{
    public function select($id){
        $data = DB::select('select * from advertising where id = ?',[$id]);

        $sql = "select `img` from advertising where id='$id'";
        $resultt = DB::select($sql);
        $img = $resultt['0']->img;

        return view('admin/advertising/advertisingselect', ['data' => $data , 'img' => $img]);
    }
}
