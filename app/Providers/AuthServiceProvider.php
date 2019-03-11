<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;


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
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin',function ($user){
            return $user->type === 'admin';
        });

        $this->registerPolicies();

        Gate::define('isPimpinan',function ($user){
            return $user->type === 'pimpinan';
        });

        $this->registerPolicies();

        Gate::define('isPegawai',function ($user){
            return $user->type === 'pegawai';
        });


        Passport::routes();

        //
    }
}
