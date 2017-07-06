<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class Role
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

        //判断是不是登录
        if (empty($_SESSION['admin']['id'])) {
                return redirect('admin/entry');
        }

        //获取
        $name = \Illuminate\Support\Facades\Route::currentRouteAction();
            $name = ltrim(strrchr($name,'\\'),'\\');
           //获取方法名
            $fname = ltrim(strrchr($name,'@'),'@');
        //获取控制器名
            $cname = strtok($name,'@');
            if ($cname == 'LoginController' && $fname =='index') {
                return $next($request);
            }
//        dump($fname,$cname);
        //查询登录的权限
        $a = DB::table('message')
                ->join('m_role',function ($join){
                    $join->on('m_role.mid','=','message.id')
                        ->where('id',$_SESSION['admin']['id']);
                })
                ->join('role','m_role.rid','=','role.id')
                ->join('r_control','role.id','=','r_control.rid')
                ->join('control','r_control.con_id','=','control.id')
                ->select('message.id','control.control','control.func')
                ->get();

        //转换数据把对象转换为数组
        foreach ($a as $v){
            $arr[$v->control][] = $v->func ;
        }
        //进行判断是不是超级用户
        if ($_SESSION['admin']['user'] != 'admin') {
//            dd($arr[$cname],empty($arr[$cname]));
            if(empty($arr[$cname]) || !in_array($fname,$arr[$cname])){
                return back()->with('error','权限不够');
            }
        }

        return $next($request);
    }
}
