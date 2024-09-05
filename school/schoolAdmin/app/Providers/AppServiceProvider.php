<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TextlocalService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TextlocalService::class, function ($app) {
            return new TextlocalService('MzQ0YzZhMzU2ZTY2NjI0YjU4Mzc0NDMxNmU3MjYzNmM=', 'GYNLGY');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
