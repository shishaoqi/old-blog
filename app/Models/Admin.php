<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Admin extends Authenticatable {
	use EntrustUserTrait;
	protected $table = 'admins';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*protected $hidden = [
        'password', 'remember_token',
    ];*/


   /* public function giveRoleTo(array $RolesId){
        $this->detachRoles();
        $this->attachRolesToId($RolesId);
    }
*/
    /**
     * Attach multiple rolesId to a user
     *
     * @param mixed $roles
     */
    public function attachRolesToId($rolesId)
    {
        foreach ($rolesId as $roleId) {
            $this->attachRole($roleId);
        }
    }


    //用户角色
    public function roles()
    {
        return $this->belongsToMany(App\Models\Role::class, 'role_user', 'user_id', 'role_id');
    }

    // 判断用户是否具有某个角色
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !!$role->intersect($this->roles)->count();
    }

    // 判断用户是否具有某权限
    public function hasPermission($permission)
    {
        dump($permission);
        if (is_string($permission)) {
            $permission = Permission::where('name',$permission)->first();
            if (!$permission) return false;
        }

        return $this->hasRole($permission->roles);
    }

    // 给用户分配角色
    public function assignRole($role)
    {
        return $this->roles()->save($role);
    }


    //角色整体添加与修改
    public function giveRoleTo(array $RoleId){
        $this->roles()->detach();
        $roles=Role::whereIn('id',$RoleId)->get();
        foreach ($roles as $v){
            $this->assignRole($v);
        }
        return true;
    }
}
