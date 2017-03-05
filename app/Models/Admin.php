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


    public function giveRoleTo(array $RolesId){
        $this->detachRoles();
        $this->attachRolesToId($RolesId);
    }

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
}
