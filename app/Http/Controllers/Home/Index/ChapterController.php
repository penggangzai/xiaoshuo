<?php

namespace App\Http\Controllers\Home\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ChapterController extends Controller
{
    public function chap($id)
    {

        //----------------------------------------------------------------
        // 奇闻趣事接口
        $curl = curl_init();
        // 设置APIKEY  URL形式
        $apikey = "4224a54e5c1d21ad784b133352512443";
        $url = "http://api.tianapi.com/qiwen/?key=$apikey&num=12";
        curl_setopt($curl, CURLOPT_URL, $url);
        // 将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // CURL执行
        $data = curl_exec($curl);
        // 关闭curl
        curl_close($curl);
        // 处理json数据
        $jsonObj = json_decode($data);
        // 提取信息列表
        if (empty($jsonObj->newslist)){
            $newslist = [];
        }else{
            $newslist = $jsonObj->newslist;
        }


        //-------------------------------------------------------------------------

        // 娱乐新闻接口
         $curl2 = curl_init();
        // 设置APIKEY  URL形式
        $url2 = "http://api.tianapi.com/huabian/?key=$apikey&num=12";
        curl_setopt($curl2, CURLOPT_URL, $url2);
        // 将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
        // CURL执行
        $data2 = curl_exec($curl2);
        // 关闭curl
        curl_close($curl2);
        // 处理json数据
        $jsonObj2 = json_decode($data2);
        // 提取信息列表
        if (empty($jsonObj2->newslist)){
            $newslist2 = [];
        }else{
            $newslist2 = $jsonObj2->newslist;
        }

        //---------------------------------------------------------------------------------
        //查询二级分类
        $list_s = DB::table('class')->where('pid', '>', '0')->where('display','1')->get();
        // 查询书名
        $name = DB::table('book')->where('id',$id)->get(['bookname']);
        // 查询所有章节
        $list = DB::table('chapter')
            ->where('bid',$id)
            ->where('status','1')
            ->orderBy('tid')
            ->get(['id','bid','title','uptime','tid']);
        return view('home.chapter.chapter',[
            'list'=>$list,
            'name'=>$name,
            'newslist'=>$newslist,
            'newslist2'=>$newslist2,
            'list_s'=>$list_s
        ]);
    }
}
