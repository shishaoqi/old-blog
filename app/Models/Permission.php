<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission {
    protected $table = 'permissions';

    public function roles(){
        return $this->belongsToMany(Role::class, 'permission_role', 'permission_id', 'role_id');
    }
}
