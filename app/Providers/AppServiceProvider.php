<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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

        Validator::extend('verification_date', function ($attr, $val, $params) {

            if(is_null($val)){
                return false;
            }

            if (Carbon::parse($val)->gt(Carbon::parse($params[0]))){

                return true;
            }
        });

    }
}
