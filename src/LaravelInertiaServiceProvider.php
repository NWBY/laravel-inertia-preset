<?php

namespace Nwby\LaravelInertia;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;

class LaravelInertiaServiceProvider extends ServiceProvider
{
    /**
     * Boot method
     */
    public function boot()
    {
        UiCommand::macro('laravel-inertia', function (UiCommand $command) {
            Preset::install();
        });
    }
}
