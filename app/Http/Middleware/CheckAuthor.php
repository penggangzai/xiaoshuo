<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class CheckAuthor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->has('autor')) {
            return redirect('home/author/login');
        }
        if(empty($_SESSION['autor'][$_SESSION['id']])) {
            return redirect('home/author/login');
        }

        $name = \Illuminate\Support\Facades\Route::currentRouteAction();
        $name = ltrim(strrchr($name,'\\'),'\\');
        //获取方法名
        $fname = ltrim(strrchr($name,'@'),'@');
        //获取控制器名
        $cname = strtok($name,'@');
        if ($fname =='add' && $cname == 'ChapterController') {
//            dd($fname,$cname);
            $data = $request->only('id');
            $result = DB::table('chapter')->where('bid',$data)->where('status',2)->value('id');
//            dd($result);
            if ($result >0 ) {
                return back()->with('error','您还有章节未审核');
            }

        }
        return $next($request);
    }
}
