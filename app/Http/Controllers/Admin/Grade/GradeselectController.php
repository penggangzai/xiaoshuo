<?php

namespace App\Http\Controllers\admin\Grade;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GradeselectController extends Controller
{
    public function select($id){
        $data = DB::select('select * from book where id = ?',[$id]);

        $sql = "select `score` from book where id='$id'";
        $resultt = DB::select($sql);
        $score = $resultt['0']->score;

        return view('admin/grade/gradeselect', ['data' => $data , 'score' => $score]);
    }
}
