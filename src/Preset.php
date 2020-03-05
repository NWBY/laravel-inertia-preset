<?php

namespace Nwby\LaravelInertia;

use Illuminate\Foundation\Console\Presets\Preset as LaravelPreset;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class Preset extends LaravelPreset
{
    public static function install()
    {
        static::cleanAssets();
        static::updatePackages();
        static::updateMix();
        static::updateJs();
    }

    public static function cleanAssets()
    {
        File::cleanDirectory(resource_path('assets/js'));
        File::cleanDirectory(resource_path('assets/sass'));
    }

    public static function updatePackageArray($packages)
    {
        return array_merge([
            'tailwindcss' => 'latest',
            '@inertiajs/inertia' => 'latest',
            '@inertiajs/inertia-vue' => 'latest'
        ], Arr::except($packages, [
            'popper.js',
            'lodash'
        ]));
    }

    public static function updateMix()
    {
        copy(__DIR__ . '/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    public static function updateJs()
    {
        copy(__DIR__ . '/stubs/app.js', resource_path('assets/js/app.js'));
    }
}
