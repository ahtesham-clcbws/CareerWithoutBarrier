<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TextlocalService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
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
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Debugbar', \Barryvdh\Debugbar\Facades\Debugbar::class);

        $this->app->singleton(TextlocalService::class, function ($app) {
            return new TextlocalService('MzQ0YzZhMzU2ZTY2NjI0YjU4Mzc0NDMxNmU3MjYzNmM=', 'GYNLGY');
        });
        \Illuminate\Http\Request::macro('hasValidSignature', function ($absolute = true) {
            if ('livewire/upload-file' || 'livewire/preview-file' == request()->path()) {
                return true;
            }
            return \Illuminate\Support\Facades\URL::hasValidSignature($this, $absolute);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        Schema::defaultStringLength(191);

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line('Click the button below to verify your email address.')
                ->action('Verify Email Address', $url);
        });
    }
}
