<?php

namespace Yourvendor\HttpErrors;

use Illuminate\Support\ServiceProvider;

class HttpErrorsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Load the package's error views under the "errors" namespace
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'errors');

        // Allow publishing views to the host app for customization
        $this->publishes([
            __DIR__ . '/../resources/views/errors' => resource_path('views/errors'),
        ], 'http-errors-views');
    }

    public function register(): void
    {
        //
    }
}