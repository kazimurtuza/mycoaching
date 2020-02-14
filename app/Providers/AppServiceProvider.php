<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\HeaderFooter;
use App\slider;
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
            $slider=DB::table('sliders')->first();
           // $slider=slider::find(1);
            $view->with([
                'user'=>$user,
                'header'=>$header,
                'footer'=>$footer,
                'slider'=>$slider,
            
            ]);
        });
        view::composer('admin.home.home', function ($view){
            //$slider=DB::table('sliders')->where('id',3);
             $slider=slider::all();
            $view->with([
                
                'slider'=>$slider,
            
            ]);
        });

      
    }
}
