<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if("admin", function(){
            if(Auth::check() && Auth::user()->is_admin == "1"){
                return true;
            }

            return false;
        });

        Blade::if("get_categories", function(){
            $categories = Category::all();
            return $categories;
        });
    }
}
