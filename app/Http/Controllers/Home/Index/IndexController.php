<?php

namespace App\Http\Controllers\Home\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $host = "http://ali-star-lucky.showapi.com";
        $path = "/star";
        $method = "GET";
        $appcode = "63d9eed667894d1dbef06bc078ed2609";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "needMonth=0&needTomorrow=0&needWeek=0&needYear=0&star=baiyang";
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }

        // CURL执行
        $data = curl_exec($curl);
//    var_dump($data);
//
////
//        print_r($data);
        echo '<br>';
//    // 处理json数据
        $jsonObj = json_decode($data);

        $jsonObjj[] = $jsonObj->showapi_res_body->day;
//        var_dump($jsonObjj);die;

        // 查询一级分类
        $list = DB::table('class')
            ->where('pid','0')
            ->where('display','1')
            ->get();
        //查询二级分类
        $list_s = DB::table('class')
            ->where('pid','>','0')
            ->where('display','1')
            ->get();

        // 首页轮播图
        $book = DB::table('banner')
            ->join('banner_book','banner.id','=','banner_book.brid')
            ->where('banner.face', '1')
            ->get(['bookname','url','wirter','intro','bid']);
        // 首页精品推荐
        $book_g = DB::table('groom')
            ->join('groom_book','groom.id','=','groom_book.brid')
            ->where('groom.face', '1')
            ->get(['bookname','url','wirter','intro','bid']);

       //首页分类推荐
        $book_s = DB::table('class')
            ->join('book','class.id','=','book.cid')
            ->join('book_img','book.id','=','book_img.bid')
            ->where('class.pid','>','0')
            ->where('book.display','1')
            ->where('book.face','1')
            ->get();
        // 广告
        $poster1 = DB::table('advertising')
            ->where('status','=','1')
            ->where('boundary','=','1')
            ->get();
        $poster2 = DB::table('advertising')
            ->where('status','=','1')
            ->where('boundary','=','2')
            ->get();
        // 查询背景音乐
        $mp = DB::table('mp3')->where('face', '1')->get(['url','display']);
        if (empty($mp['0'])){
            $mp->url  = '';
            $mp->display='2';
        } else {
            $mp = $mp['0'];
        }
        // 公告查询
        $not = DB::table('notice')->where('face', '1')->get(['title']);
        if (empty($not['0'])){
            $not->title  = '';
        } else {
            $not = $not['0'];
        }
        // 排行榜
        $book_ss = DB::table('book')
            ->orderBy('score', 'desc')
            ->get();
        // 友情链接
        $exchange = DB::table('exchange')
            ->orderBy('status', '=', '1')
            ->get();
        $news = $this->api();
        $news2 = $this->api2();

//        dd($news2);
        // 加载页面
        return view('home/indexshow',[
            'list'=>$list,
            'list_s'=>$list_s,
            'book'=>$book,
            'book_s'=>$book_s,
            'book_g'=>$book_g,
            'poster1'=>$poster1,
            'poster2'=>$poster2,
            'mp'=>$mp,
            'not'=>$not,
            'book_ss'=>$book_ss,
            'exchange'=>$exchange,
            'news'=>$news,
            'news2'=>$news2,
            'jsonObjj'=>$jsonObjj
        ]);
    }


    private function api()
    {
        $curl = curl_init();
        // 设置APIKEY  URL形式
        $apikey = "c9d85939d85dc416bfcbafc33a8fb0db";
        $url = "http://api.tianapi.com/guonei/?key=".$apikey."&num=3";
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

        return $newslist;
    }

    private function api2()
    {
        $curl = curl_init();
        // 设置APIKEY  URL形式
        $apikey = "c9d85939d85dc416bfcbafc33a8fb0db";
        $url = "http://api.tianapi.com/health/?key=".$apikey."&num=3";
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

        return $newslist;
    }

}
