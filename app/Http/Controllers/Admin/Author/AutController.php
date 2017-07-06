<?php

namespace App\Http\Controllers\Admin\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Model\ImgUp;


class AutController extends Controller
{
    public function index()
    {
        $data = DB::table('autor')
            ->join('autor_info','autor.id','=','autor_info.aid')
            ->select('autor.id','autor.phone','autor.logintime','autor.loginip','autor_info.integral','autor.status','autor_info.autorname','autor_info.icon')
            ->paginate('3');
        return view('admin/author/index',['data'=>$data]);
    }
    //添加列表
    public function add()
    {

       return view('admin/author/authoradd');
    }
    //执行添加
    public function insert(Request $request)
    {
        $data = $request->all();
        $phone = '/^1(3|4|5|7|8)\d{9}$/';
        $pwd = '/^[a-zA-Z]\w{5,17}$/';
        $name = "/^[\x{4E00}-\x{9FA5}A-Za-z0-9_]{1,15}$/u";
        $email = '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/';
        //对数据进行判断
        if (!(preg_match($phone,$data['phone']) && preg_match($pwd,$data['pwd']) && preg_match($name,$data['autorname']) && preg_match($email,$data['email']))) {
            return back()->with(['error'=>'别瞎来111!','success'=>'warning']);
        }
        if ($data['pwd'] != $data['repwd']){
            return back()->with(['error'=>'别瞎来!','success'=>'warning']);
        }
        $pwd = md5($data['pwd']);
        //判断账号是不是存在
        $only = DB::table('autor')->where('phone',$data['phone'])->value('id');
        if ($only > 0 ) {
            return back()->with(['error'=>'账号已经存在!','success'=>'warning']);
        }
        if ( !empty($request->file())) {
            $list = new ImgUp();
            $img = $list->upimg($request);
            $data['icon'] = $img;
        } else {
            $data['icon'] = '';

        }
        //执行添加
        DB::beginTransaction();
        try{
            $result1 = DB::table('autor')->insertGetId(['phone' => $data['phone'], 'utime' => $data['utime'], 'pwd' =>$pwd ,'status'=>$data['status']]);
//            dd($result1);
            $li = DB::table('autor_info')->insert(['aid' => $result1, 'autorname' => $data['autorname'],'email'=>$data['email'],'icon'=>$data['icon']]);
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
        }

        if (!$li){
            return back()->with(['error'=>'添加失败!','success'=>'warning']);
        }

        return redirect('/admin/author/index')->with(['error'=>'添加成功!','success'=>'success']);
    }
    //修改状态的方法 ajax
    public function status(Request $request,$id)
    {
        $data = $request->only('stutus');
        if ($data['stutus'] == 1){
            $stutus = 2;
        }
        if ($data['stutus'] == 2){
            $stutus = 1;
        }
        $result = DB::table('autor')->where('id',$id)->update(['status'=>$stutus]);
        if ($result){
            $data['stutus'] = true;
            $data['info'] = $stutus;
        }else{
            $data['stutus'] = false;
        }
        return response()->json($data);
    }
    //作者详情

    public function details(Request $request,$id)
    {

        session(['a'=>$id]);
        $data = DB::table('autor')
            ->join('book',function ($join){
                $join->on('autor.id','=','book.aid')
                    ->where('autor.id','=',session('a'));

            })
            ->join('class','class.id','=','book.cid')
            ->select('book.id','book.bookname','book.display','book.status','book.time','book.subscribe','class.name')
            ->get();
        $list = DB::table('autor')
            ->join('autor_info','autor_info.aid','=','autor.id')
            ->where('autor.id',$id)
            ->select('autor.phone','autor_info.autorname','autor.utime')
            ->get();
            if (empty($list[0])) {
                return back()->with(['error'=>'请稍后再试试!','success'=>'warning']);

            }
//            dd($data);
        return view('admin/author/list',['data'=>$data,'list'=>$list[0]]);
    }

}
