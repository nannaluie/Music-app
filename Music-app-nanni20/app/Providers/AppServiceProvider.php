<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\LastfmService;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(LastfmService::class, function ($app) {
            $apiKey = env('LASTFM_API_KEY');
            return new LastfmService($apiKey);
        });
    }

    public function boot(): void
    {
        //
    }
}
