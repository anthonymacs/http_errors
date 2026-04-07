<?php

namespace Anthonymacs\HttpErrors;

use Illuminate\Support\ServiceProvider;

class HttpErrorsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'errors');

        $this->publishes([
            __DIR__ . '/../resources/views/errors' => resource_path('views/errors'),
        ], 'http-errors-views');
    }

    public function register(): void
    {
        //
    }
}