<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Role;
use App\Models\Admin;
use App\Models\Permission;

class AdminController extends Controller
{
    public function index(){
        $admin = Auth::guard('admin')->user();
        dd($admin);

        return view('admin.index.index');
    }

    public function check(){
        $admin = Role::where('name', '=', 'admin')->first();
        //dd($admin);
        $managePosts = Permission::where('name', '=', 'create-post')->first();//->toArray
        //dd($managePosts);

        //添加用户组权限# 
        //$owner->perms()->sync(array($managePosts->id, $manageUsers->id));
        $admin->perms()->sync(array($managePosts->id));

        //添加用户到用户组# 
        // 获取用户
       /* $user = User::where('name','=','shishao')->first();

        // 可以使用 Entrust 提供的便捷方法用户授权
        // 注: 参数可以为 Role 对象, 数组, 或者 ID
        $user->attachRole( $admin ); 

        // 或者使用 Eloquent 自带的对象关系赋值
        $user->roles()->attach( $admin->id ); // id only*/
    }
}
