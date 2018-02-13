<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Company\Company;
use Illuminate\Support\Facades\Schema;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('companies')){
            $companies=Company::all();
            View::share('companies', $companies);
        }
         if(Schema::hasTable('users')){
            $user1=User::where('id', 1)->first();
            View::share('user1', $user1);
            Auth::login($user1);
         }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
