<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminPermission extends Model
{
    protected $table='admin_permissions';

    public function roles()
    {
        return $this->belongsToMany(Role::class,'admin_permission_role','permission_id','role_id');
    }

}
