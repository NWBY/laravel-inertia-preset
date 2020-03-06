<?php

namespace Nwby\LaravelInertia;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class LaravelInertiaServiceProvider extends ServiceProvider
{
    /**
     * Boot method
     */
    public function boot()
    {
        PresetCommand::macro('laravel-inertia', function ($command) {
            Preset::install();
        });
    }
}
