<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole {
    //protected $table = 'roles';

    public function permissions() {
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
    }

    public function users() {
        return $this->belongsToMany(Admin::class, 'role_user', 'role_id', 'user_id');
    }

    //给角色添加权限
    /*public function givePermissionTo($permission) {
        return $this->permissions()->save($permission);
    }*/
}
