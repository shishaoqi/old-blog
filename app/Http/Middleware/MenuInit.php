<?php

namespace App\Http\Middleware;

use Closure;
use Entrust;
use Auth, Cache;

class MenuInit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //view()->share('comData',$this->getMenu());
        $request->attributes->set('left_menu', $this->getMenu());
        return $next($request);
    }

    /**
     * 获取左边菜单栏
     * @return array
     */
    function getMenu()
    {
        $openArr = [];
        $data = [];
        $data['top'] = [];
        //查找并拼接出地址的别名值
        $path_arr = explode('/', \URL::getRequest()->path());
        if (isset($path_arr[1]) && isset($path_arr[2])) {
            $urlPath = $path_arr[0] . '/' . $path_arr[1] . '/' . $path_arr[2];
        } else if (isset($path_arr[1])) {
            $urlPath = $path_arr[0] . '/' . $path_arr[1];
        } else {
            $urlPath = $path_arr[0] . '/index';
        }

        //查找出所有的地址
        /*$menus = Cache::store('file')->rememberForever('menus', function () {
            return \App\Models\Permission::where('name', 'LIKE', '%index')->orWhere('cid', 0)->get();
        });*/
        //dump(Entrust::hasRole('管理员1'));
        //dump(Entrust::hasRole('管理员2'));
        //$menus = \App\Models\Permission::where('name', 'LIKE', '%index')->orWhere('cid', 0)->get();
        $menus = \App\Models\Permission::get()->toArray();
        if(!empty($menus)){
            foreach ($menus as $key => $v) {
                // dump($v->name);
                //dump(Entrust::can($v['name']));
                //dd(Entrust::hasRole('管理员1'));
                if (!Entrust::can($v['name'])) {
                    unset($menus[$key]);
                }
            }
        }
        $menus = menuListToTree($menus, 'id', 'cid', '_child', 0, $urlPath);
        //dd($menus);
        return $menus;
    }
}
