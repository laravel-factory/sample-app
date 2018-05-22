let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

// Admin styles
mix.styles('resources/assets/css/admin/app.css', 'public/css/admin/app.css')
    .styles([
        'resources/assets/css/admin/bootstrap.css',
        'resources/assets/css/admin/font-awesome.css',
        'resources/assets/css/admin/pikaday.css',
        'resources/assets/css/admin/AdminLTE.css',
        'resources/assets/css/admin/adminlte-skin-blue.css',
        'resources/assets/css/admin/pnotify.css',
    ], 'public/css/admin/vendor.css')
;

// Admin font awesome fonts
mix.copyDirectory('resources/assets/fonts', 'public/css/fonts');

// Admin JS
mix.scripts('resources/assets/js/admin/app.js', 'public/js/admin/app.js'
    ).scripts([
        'resources/assets/js/admin/jquery.js',
        'resources/assets/js/admin/bootstrap.js',
        'resources/assets/js/admin/pikaday.js',
        'resources/assets/js/admin/adminlte.js',
        'resources/assets/js/admin/pnotify.js',
    ], 'public/js/admin/vendor.js')
;

if (mix.inProduction()) {
    mix.version();
}
