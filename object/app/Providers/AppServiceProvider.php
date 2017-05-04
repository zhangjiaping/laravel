<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $goods = DB::table('goods')->get();
        $type = DB::table('type')->whereNotIn('name',['手机'])->get();
        $con=DB::table('config')->first();
        $links = DB::table('links')->where('switch',1)->get();
        View::share('links',$links);
        View::share('con',$con);
        View::share('type',$type);
        View::share('goods',$goods);
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
