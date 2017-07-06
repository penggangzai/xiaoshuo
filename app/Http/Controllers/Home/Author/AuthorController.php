<?php

namespace App\Http\Controllers\Home\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Model\ImgUp;


class AuthorController extends Controller
{
    //加载用户详情
    public function authorinfo(Request $request,$id)
    {
        $list = DB::table('autor')
            ->join('autor_info','autor.id','=','autor_info.aid')
            ->where('id',$id)
            ->select('autor.id','autor.phone','autor_info.autorname','autor_info.sex','autor_info.icon','autor_info.email')
            ->get();
        if (empty($list)) {
            return back()->with('error','没有相对应数据');
        }
        return view('home.author.authorInfo',['data'=>$list[0]]);
    }
    //执行修改用户方法
    public function save(Request $request)
    {
        $data = $request->only('autorname','id','email','sex');
        $name = "/^[\x{4E00}-\x{9FA5}A-Za-z0-9_]{1,15}$/u";
        $email = '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/';
        //进行数据验证
        if ( !preg_match($name,$data['autorname']) && !preg_match($email,$data['email'])) {
            return back()->with('请不要瞎玩');
        }
//        dd($request->file());
        $imgas = DB::table('autor_info')->where('aid',$data['id'])->value('icon');

        //判断是不是上传图片
        if ( !empty($request->file())) {
            $list = new ImgUp();
            $img = $list->upimg($request);
            if (!$img) {
                return back()->with('error','图片过大上传出问题');
            }
            if (!empty($imgas)) {
                unlink($imgas);

            }
        } else {
            $img = $imgas;
        }

            $li = DB::table('autor_info')->where('aid',$data['id'])->update([ 'autorname' => $data['autorname'],'email'=>$data['email'],'sex'=>$data['sex'],'icon'=>$img]);

        //进行结果判断
        if($li) {
            $_SESSION['name'] = $data['autorname'];
            $_SESSION['author']['icon'] = $img;
            return redirect('/home/author/work/'.$data['id'])->with('error','修改成功');
        }
        return back()->with('error','修改失败');

    }
    //加载首页
    public function index(Request $request ,$id=1)
    {
        $curl = curl_init();
        // 设置APIKEY  URL形式
        $apikey = "c9d85939d85dc416bfcbafc33a8fb0db";
        $page = empty($id)?'1':$id;
        $url = "http://api.tianapi.com/qiwen/?key=".$apikey."&num=20&page=".$page;
        curl_setopt($curl, CURLOPT_URL, $url);
        // 将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // CURL执行
        $data = curl_exec($curl);
        // 关闭curl
        curl_close($curl);
        // 处理json数据
        $jsonObj = json_decode($data);
        // 提取文章列表
        if(empty($jsonObj->newslist)) {
            $newslist = [];
        } else {
            $newslist = $jsonObj->newslist;

        }
        $url = DB::table('autor')
            ->join('autor_info','autor.id','=','autor_info.aid')
            ->where('autor.id',$_SESSION['id'])
            ->select('autor_info.icon')
            ->get();
        $_SESSION['author']['icon'] = $url[0]->icon;
        return view('home.author.index',['data'=>$newslist,'page'=>$page]);
    }
    //加载登录页面
    public function login()
    {
        return view('home.author.login');
    }
    //注册页面加载
    public function rig()
    {
        return view('home.author.register');
    }

    //修改密码方法
    public function pwd(Request $request)
    {
        $data = $request->all();
        $pwd = '/^[a-zA-Z]\w{5,17}$/';
        if(!preg_match($pwd,$data['pwd'])) {
            return back()->with('error','密码格式不正确');
        }
        if ($data['pwd'] != $data['repwd']) {
            return back()->with('error','俩次密码不一致');

        }
        $list = DB::table('autor')->where('id','=',$data['id'])->select('pwd')->get();
        $list = $list[0];

        if (md5($data['ypwd']) != $list->pwd) {
            return back()->with('error','原密码不正确');
        }
        $result = DB::table('autor')->where('id','=',$data['id'])->update(['pwd'=>md5($data['pwd'])]);
        if($result) {
            return back()->with('error','修改成功');
        }
        return back()->with('error','修改失败');

    }

    //书籍页面加载
    public function work(Request $request,$id)
    {
        $data = DB::table('class')
            ->join('book','class.id','=','book.cid')
//            ->join('chapter','book.id','=','chapter.bid')
//            ->where('book.display','=','1')
            ->where('book.aid','=',$id)
            ->select('book.bookname','book.subscribe','book.status','class.name','book.id')
            ->distinct()
            ->get();

        foreach ($data as $v){
            $max[$v->id] = DB::table('chapter')->where('bid',$v->id)->count();
            $title[$v->id] = DB::table('chapter')->where('bid',$v->id)->
                where('tid',$max[$v->id])->select('title')->get();

        }
//        dd($title[41][0]);
        foreach ($data as $v) {
            $list[$v->id]['bookname']= $v->bookname;
            $list[$v->id]['subscribe'] = $v->subscribe;
            $list[$v->id]['name'] = $v->name;
            $list[$v->id]['status'] = $v->status;
            foreach ($max as $k => $val) {
                if($v->id == $k) {
                    $list[$v->id]['count'] = $val;
                }
            }
            if (!empty($title[$v->id][0])){
                foreach ($title as $key =>$val1) {
                    if ( $v->id == $key) {
                        $list[$v->id]['title'] = $val1[0]->title;
                    }
                }
            } else {
                $list[$v->id]['title'] = '暂无章节';
            }

        }
//        dd($list);

        if (empty($list)) {
            $bookcount = 0;
            $list = '';
        } else {
            $bookcount = count($list);

        }
//        dd($bookcount);
        return view('home.author.work',['data'=>$list,'count'=>$bookcount]);
    }
    //加载添加书籍页面
    public function add(Request $request)
    {
        $sql = 'select `id`, `name`, `path`, concat(path, id, ",") as px
           from  `class`
           order by px
           ';
        // 查询所有分类;
        $list = DB::select($sql);
        return view('home.author.addbook',['list'=>$list]);
    }
    //执行添加方法
    public function insert(Request $request)
    {
        $data = $request->only(['bookname', 'wirter', 'cid', 'intro', 'display', 'status','aid']);
//        dd($data,$_SESSION);
        //判断是不是填写咯数据
        foreach ($data as $k => $v) {
            if (!$v && $k != 'intro') {
                return back()->with('error','请填写完整数据');
            }
        }
        // 查看book表中是否存在改书名
        $cla = DB::table('book')->where('bookname', $data['bookname'])->first();

        if ($cla) {
            // 如果存在跳转回添加页面
            return back()->with('error','该书籍已经存在');
        } else {
            $data['time'] = time();
            if ( !empty($request->file())) {
                $list = new ImgUp();
                $img = $list->upimg($request);
                if (!$img) {
                    return back()->with('error','图片过大上传出问题');
                }
            } else {
               $img = '';
            }
            //执行添加
            DB::beginTransaction();
            try{
                $id = DB::table('book')->insertGetId($data);
                $id = DB::table('book_img')->insert(['bid'=>$id,'url'=>$img]);
                DB::commit();
            }catch (\Exception $e) {
                DB::rollBack();
            }
        }

        if ($id) {
            return redirect('/home/author/work/'.$_SESSION['id'])->with('error','添加成功');
        } else {
            return back()->with('error','添加失败');
        }

    }
    //修改书籍信息加载页面
    public function edit(Request $request,$id)
    {
        $data = DB::table('book')->where('id',$id)->select('bookname','intro','status','id')->get();
        if (empty($data)) {
            return back()->with('error','请稍后再试试');
        }
//        dd($data);
        return view('home.author.editbook',['data'=>$data[0]]);
    }
    //执行修改数据
    public function editbook(Request $request)
    {
        $data = $request->only('status','intro','id');
//        dd($data);

        $result = DB::table('book')->where('id',$data['id'])->update($data);
        if ($result > 0) {
            return redirect('/home/author/work/'.$_SESSION['id'])->with('error','添加成功');
        }
        return back()->with('error','修改失败');
    }
    //执行作者添加
    public function addrig(Request $request)
    {

        $data = $request->all();
        $phone = '/^1(3|4|5|7|8)\d{9}$/';
        $pwd = '/^[a-zA-Z]\w{5,17}$/';
        $name = "/^[\x{4E00}-\x{9FA5}A-Za-z0-9_]{1,15}$/u";
        $email = '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/';
        //对数据进行判断
        if (!(preg_match($phone,$data['phone']) && preg_match($pwd,$data['pwd']) && preg_match($name,$data['autorname']) && preg_match($email,$data['email']))) {
            return back()->with('error','别瞎来');
        }
        if ($data['pwd'] != $data['repwd']){
            return back()->with('error','别瞎来');
        }
        $pwd = md5($data['pwd']);
        $only = DB::table('autor')->where('phone',$data['phone'])->value('id');
        if ($only > 0 ) {
            return back()->with('error','账号已经存在');
        }
        DB::beginTransaction();
        try{
            $result1 = DB::table('autor')->insertGetId(['phone' => $data['phone'], 'utime' => $data['utime'], 'pwd' =>$pwd ,'status'=>$data['status']]);
//            dd($result1);
            $li = DB::table('autor_info')->insert(['aid' => $result1, 'autorname' => $data['autorname'],'email'=>$data['email']]);
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
        }
        //判断是不是登录
        if (!$li){
            return back()->with('error','注册失败');
        }else{
            return redirect('/home/author/login')->with('error','注册成功');
        }

    }
}
