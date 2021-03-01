<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Paginator::useTailwind();
        
        $this->registerPolicies();

        Passport::routes();
    }

    protected $policies =[
        'App\Models' => 'App\Policies\ModelPolicy',
    ];
}
