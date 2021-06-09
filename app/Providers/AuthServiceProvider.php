<?php

namespace App\Providers;

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

        # admin 
        Gate::define('admin', function ($user) {
            $admins = explode(',', env('ADMINS'));
            return ( in_array($user->codpes, $admins) and $user->codpes );
        });

        # logado
        Gate::define('logado', function ($user) {
            return true;
        });

        # owner
        Gate::define('owner', function ($user, $model) {
            if(Gate::allows('admin')) return true;
            return $model->user_id == $user->id;
        });
        
    }
}
