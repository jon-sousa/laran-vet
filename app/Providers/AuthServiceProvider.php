<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        
        Auth::extend('cliente', function ($app, $name, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\Guard...

            $guard =  new ClienteGuard(Auth::createUserProvider($config['provider']), $app->make('request'));
            var_dump($guard);
            return $guard;
        });
    }
}
