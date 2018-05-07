<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SeoServiceProvider extends ServiceProvider
{

    /**
     * Register SeoService class with the Laravel IoC container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Seo\Contracts\SeoContract::class,
            \App\Services\Seo\SeoService::class
        );
    }

}