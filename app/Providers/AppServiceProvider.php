<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;
use View;
use DB;

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
        //$adverts = "TEST";

        View::composer('layouts.app', function ($view) {
            $adverts = DB::table('adverts')->where('status', 'confirmed')->get();

            foreach($adverts as $advert){
                $adv = DB::table('users')->where('id', $advert->creator_id)->first();
                $advert->status = $adv->status;
            }

            $view->with('adverts', $adverts);
        });

        Builder::defaultStringLength(191); // Update defaultStringLength
    }
}
