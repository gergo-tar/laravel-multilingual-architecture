<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{

    /**
     * Register PostService class with the Laravel IoC container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Post\Contracts\PostContract::class,
            \App\Services\Post\PostService::class
        );
    }

}