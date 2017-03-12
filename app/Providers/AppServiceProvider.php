<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Form;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Set all to pt_BR
        setlocale (LC_ALL, 'pt_BR');
        date_default_timezone_set("America/Sao_Paulo");
        Carbon::setLocale(config('app.locale'));

        //DB instructions
        Schema::defaultStringLength(191);

        //Make componentes
        Form::component('clientList',       'components.clientList',        ['name', 'label', 'clients']);
        Form::component('clientListPlus',   'components.clientListPlus',    ['name', 'label', 'clients']);        
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
