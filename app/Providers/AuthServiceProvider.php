<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /**
         * Define um gate de superAdmin
         */
        Gate::define('isSuperAdmin', function (User $user) {
            return  $user->hasRole('super-admin') ? true : null;
        });

        Gate::before(function ($user, $ability) {
            return $user->hasRole('super-admin') ? true : null;
        });

        /**
         * Define um gate de superAdmin
         */
        Gate::define('isAdmin', function (User $user) {
            return  $user->hasRole('administrador') ? true : null;
        });

        Gate::before(function ($user, $ability) {
            return $user->hasRole('administrador') ? true : null;
        });

        /**
         * Define um gate de superAdmin
         */
        Gate::define('isOngAdmin', function (User $user) {
            return  $user->hasRole('ong-admin') ? true : null;
        });

        Gate::before(function ($user, $ability) {
            return $user->hasRole('ong-admin') ? true : null;
        });
    }
}
