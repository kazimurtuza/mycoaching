<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\HeaderFooter;
use Illuminate\Support\Facades\DB;

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
        view::composer('admin.master', function ($view){
            $user = Auth::user();
            $header= HeaderFooter::first();
            $footer= DB::table('header_footers')->first();
            $view->with([
                'user'=>$user,
                'header'=>$header,
                'footer'=>$footer,
            
            ]);
        });

      
    }
}
