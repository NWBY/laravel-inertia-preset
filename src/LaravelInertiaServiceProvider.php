<?php

namespace Nwby\LaravelInertia;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;
use Preset;

class LaravelInertiaServiceProvider extends ServiceProvider
{
    /**
     * Boot method
     */
    public function boot()
    {
        PresetCommand::macro('inertia', function ($command) {
            Preset::install();
        });
    }
}
