<?php

namespace Nwby\LaravelInertia;

use Illuminate\Support\Facades\File;

class Preset
{
    public static function install()
    {
        static::cleanAssets();
        static::updatePackages();
        static::updateMix();
        static::updateJs();
        static::updateSass();
        static::updateViews();
        static::createTailwindConfig();
    }

    /**
     * Clean js and sass directories
     */
    public static function cleanAssets()
    {
        File::cleanDirectory(resource_path('js'));
        File::cleanDirectory(resource_path('sass'));
    }

    /**
     * Update package.json
     */
    public static function updatePackages()
    {
        copy(__DIR__ . '/stubs/js/package.json', base_path('package.json'));
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
        copy(__DIR__ . '/stubs/js/app.js', resource_path('js/app.js'));
    }

    /**
     * Update scss directory
     */
    public static function updateSass()
    {
        copy(__DIR__ . '/stubs/scss/_tailwind.scss', resource_path('sass/_tailwind.scss'));
        copy(__DIR__ . '/stubs/scss/app.scss', resource_path('sass/app.scss'));
        File::put(resource_path('sass/_variables.scss'), '');
    }

    public static function updateViews()
    {
        File::deleteDirectory(resource_path('views/layouts'));
        copy(__DIR__ . '/stubs/views/app.blade.php', resource_path('views/app.blade.php'));

        // Auth files
        copy(__DIR__ . '/stubs/views/login.blade.php', resource_path('views/auth/login.blade.php'));
        copy(__DIR__ . '/stubs/views/register.blade.php', resource_path('views/auth/register.blade.php'));
        copy(__DIR__ . '/stubs/views/verify.blade.php', resource_path('views/auth/verify.blade.php'));

        // Auth/passwords files
        copy(__DIR__ . '/stubs/views/passwords/confirm.blade.php', resource_path('views/auth/passwords/confirm.blade.php'));
        copy(__DIR__ . '/stubs/views/passwords/email.blade.php', resource_path('views/auth/passwords/email.blade.php'));
        copy(__DIR__ . '/stubs/views/passwords/reset.blade.php', resource_path('views/auth/passwords/reset.blade.php'));
    }

    public static function createTailwindConfig()
    {
        copy(__DIR__ . '/stubs/tailwind.config.js', base_path('tailwind.config.js'));
    }
}
