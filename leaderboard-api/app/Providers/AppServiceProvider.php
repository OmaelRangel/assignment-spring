<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Console\Commands\DeclareWinner;
use Illuminate\Console\Scheduling\Schedule;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
    	$this->app->singleton(DeclareWinner::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
