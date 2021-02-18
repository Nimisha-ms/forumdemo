<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();

       /* \View::share('channels', \App\Models\Channel::all());*/
       \View::composer('*', function($view){
            $channels = \Cache::rememberForever('channels', function(){
                return  \App\Models\Channel::all();
            });
            //$view->with('channels', \App\Models\Channel::all());
            $view->with('channels', $channels);
       });
    }
}
