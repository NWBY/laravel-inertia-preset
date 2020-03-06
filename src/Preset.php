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
        static::updateSass();
        static::updateViews();
    }

    /**
     * Clean js and sass directories
     */
    public static function cleanAssets()
    {
        File::cleanDirectory(resource_path('assets/js'));
        File::cleanDirectory(resource_path('assets/sass'));
    }

    /**
     * Update package.json
     */
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

    /**
     * Update webpack.mix.js
     */
    public static function updateMix()
    {
        copy(__DIR__ . '/stubs/js/webpack.mix.js', base_path('webpack.mix.js'));
    }

    /**
     * Update Js directory
     */
    public static function updateJs()
    {
        copy(__DIR__ . '/stubs/js/app.js', resource_path('assets/js/app.js'));
    }

    /**
     * Update scss directory
     */
    public static function updateSass()
    {
        copy(__DIR__ . '/stubs/scss/_tailwind.scss', resource_path('assets/sass/_tailwind.scss'));
        copy(__DIR__ . '/stubs/scss/app.scss', resource_path('assets/sass/app.scss'));
        File::put(resource_path('assets/sass/_variables.scss'), '');
    }

    public static function updateViews()
    {
        File::deleteDirectory(resource_path('assets/views/layout'));
        copy(__DIR__ . '/stubs/views/app.blade.php', resource_path('assets/views/app.blade.php'));

        // Auth files
        copy(__DIR__ . '/stubs/views/login.blade.php', resource_path('assets/views/auth/login.blade.php'));
        copy(__DIR__ . '/stubs/views/register.blade.php', resource_path('assets/views/auth/register.blade.php'));
        copy(__DIR__ . '/stubs/views/verify.blade.php', resource_path('assets/views/auth/verify.blade.php'));

        // Auth/passwords files
        copy(__DIR__ . '/stubs/views/passwords/confirm.blade.php', resource_path('assets/views/auth/passwords/confirm.blade.php'));
        copy(__DIR__ . '/stubs/views/passwords/email.blade.php', resource_path('assets/views/auth/passwords/email.blade.php'));
        copy(__DIR__ . '/stubs/views/passwords/reset.blade.php', resource_path('assets/views/auth/passwords/reset.blade.php'));
    }
}
