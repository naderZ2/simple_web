<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\back\Social;
use App\Models\back\Servicedept;
use App\Models\back\Page;
use App\Models\back\User;
// use Illuminate\Support\Facades\View;
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
        //
        view()->composer(['front.layouts.master','front.contact'],function($view){
            $view->with('result_socials', Social::where('type',1)->where('active',1)->where('link','!=',null)->get());
        });

        view()->composer(['front.layouts.master','front.contact'],function($view){
            $view->with('result_socials_informations', Social::where('type',2)->where('id','>',8)->where('active',1)->get());
        });

        view()->composer(['front.layouts.master','front.contact'],function($view){
            $view->with('result_address', Social::find(7));
        });        
        
        view()->composer(['front.layouts.master','front.contact'],function($view){
            $view->with('result_address_en', Social::find(8));
        });

        view()->composer('front.layouts.master',function($view){
            $view->with('result_brand_menus', Servicedept::get());
        });

        view()->composer('front.layouts.master',function($view){
            $view->with('result_about', Page::find(1));
        });
        view()->composer('front.layouts.master',function($view){
            $view->with('data', User::find(1));
        });
        
           view()->composer('front.index',function($view){
            $view->with('data', User::find(1));
        });

    }
}
