<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        //权限1-开始
        if (!empty($_SERVER['SCRIPT_NAME']) && strtolower($_SERVER['SCRIPT_NAME']) === 'artisan') {
            return false;
        }
        $gate->before(function ($user, $ability) {
            if ($user->id === 1) {
                return true;
            }
        });
        //权限1-结束1

        $this->registerPolicies($gate);//原 只有此一行代码 

        //权限1-开始
        $permissions = \App\Models\Permission::with('roles')->get();
        foreach ($permissions as $permission) {
            $gate->define($permission->name, function ($user) use ($permission) {
                return $user->hasPermission($permission);
            });
        }
        //权限1-结束2
    }
}
