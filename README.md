# Laravel Inertia.js Preset

Preset for fresh Laravel applications that adds Inertia.js and TailwindCSS and sets them up with Vue.js. This preset is designed to be used with the Laravel Authentication scaffolding.

### Note

The preset uses the Laravel auth blade templates for the authentication pages. Converting the blade files to use Vue and Inertia may be done in a future version.

### Usage

Create a new Laravel application and move into that directory:

```
laravel new pied_piper && cd pied_piper
```

Then install the `laravel/ui` package inside of your project:

```
composer require laravel/ui
```

Run the UI artisan command:

```
php artisan ui vue --auth
```

Install the preset:

```
composer require nwby/laravel-inertia-preset
```

Run the preset:

```
php artisan ui laravel-inertia
```
