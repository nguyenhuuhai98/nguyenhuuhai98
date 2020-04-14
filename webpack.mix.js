const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
   // .css('resources/css/progressbar.css', 'public/css/progressbar.css')
   .sass('resources/sass/app.scss', 'public/css')
   .js('resources/js/notification.js', 'public/js')
   .js('resources/js/chart.js', 'public/js')
   .js('resources/js/progress.js', 'public/js')
   .js('resources/js/countdown.js', 'public/js')
   .styles([
        'resources/css/progressbar.css'
    ], 'public/css/style.css');
