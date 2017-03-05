<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Role;
use App\Models\Admin;
use App\Models\Permission;

class TestController extends Controller
{
    public function form()
    {
        return view('test.form');
    }

    public function testValidate(Requests\FormRequest $request)
    {
        return 'success';
    }

    public function createRole(){
        $owner = new Role();
        $owner->name         = 'owner';
        $owner->display_name = 'Project Owner'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        //$owner->save();

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        //$admin->save();

        dump($owner);
    }

    public function storeRole(){
        $role = new Role();
       foreach (array_keys($this->fields) as $field) {
            $role->$field = $request->get($field);
        }
        unset($role->perms);
        // dd($request->get('permission'));
        $role->save();
    }

    public function selectRole(){
        $role = Role::where('name', '=', 'owner')->first();//->toArray()
        dump($role);
    }

    public function assign(){
        $owner = Role::where('name', '=', 'owner')->first()->toArray();//
       /* $role = new Role();
        $role->name         = $owner['name'];
        $role->display_name = $owner['display_name'];
        $role->description  = $owner['description'];*/

        //dump($owner);
        $user = Admin::where('name', '=', 'shishao')->first();
        // role attach alias
        $user->attachRole($owner); // parameter can be an Role object, array, or id

        // or eloquent's original technique
        //$user->roles()->attach($owner->id); // id only
        dump('done');
    }

    public function createPermission(){
        $createPost = new Permission();
        $createPost->name         = 'create-post';
        $createPost->display_name = 'Create Posts'; // optional
        // Allow a user to...
        $createPost->description  = 'create new blog posts'; // optional
        $createPost->save();

        $editUser = new Permission();
        $editUser->name         = 'edit-user';
        $editUser->display_name = 'Edit Users'; // optional
        // Allow a user to...
        $editUser->description  = 'edit existing users'; // optional
        $editUser->save();

        dump('createPermission');
    }

    public function addPermissions(){
        $admin = Admin::where('name', '=', 'shishao')->first();
        $createPost = Permission::where('name', '=', 'create-post')->first();//->toArray()

        $admin->attachPermission($createPost);
        // equivalent to $admin->perms()->sync(array($createPost->id));

        $owner->attachPermissions(array($createPost, $editUser));
        // equivalent to $owner->perms()->sync(array($createPost->id, $editUser->id));
        dump('addPermission');
    }

    public function check(){
        //创建用户组#
        $admin = new Role;
        $admin->name = 'Admin';
        $admin->save();

        $owner = new Role;
        $owner->name = 'Owner';
        $owner->save();

        //创建权限# 
        $manageUsers = new Permission;
        $manageUsers->name = 'manage_users';
        $manageUsers->display_name = 'Manage Users';
        $manageUsers->save();

        $managePosts = new Permission;
        $managePosts->name = 'manage_posts';
        $managePosts->display_name = 'Manage Posts';
        $managePosts->save();

        //添加用户组权限# 
        $owner->perms()->sync(array($managePosts->id, $manageUsers->id));
        $admin->perms()->sync(array($managePosts->id));

        //添加用户到用户组# 
        // 获取用户
        $user = User::where('name','=','shishao')->first();

        // 可以使用 Entrust 提供的便捷方法用户授权
        // 注: 参数可以为 Role 对象, 数组, 或者 ID
        $user->attachRole( $admin ); 

        // 或者使用 Eloquent 自带的对象关系赋值
        $user->roles()->attach( $admin->id ); // id only

        /*$user = new Admin();
        //dd($user);
        dd('$user->hasRole(owner):'.$user->hasRole('admin'));   // false
        $user->hasRole('admin');   // true
        $user->can('edit-user');   // false
        $user->can('create-post'); // true

        //Both hasRole() and can() can receive an array of roles & permissions to check:
        $user->hasRole(['owner', 'admin']);       // true
        $user->can(['edit-user', 'create-post']); // true*/
    }


}
