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
    .sass('resources/sass/app.scss', 'public/css')
    .browserSync('127.0.0.1:8000')
    .copyDirectory('node_modules/tinymce', 'public/node_modules/tinymce')
    .copyDirectory('node_modules/jquery', 'public/node_modules/jquery')
    .copy('node_modules/flexmasonry/dist/flexmasonry.css', 'public/node_modules/flexmasonry/dist/flexmasonry.css')
    .copy('node_modules/flexmasonry/dist/flexmasonry.js', 'public/node_modules/flexmasonry/dist/flexmasonry.js')
    .copy('node_modules/chart.js/dist/Chart.bundle.js', 'public/node_modules/chart.js/dist/Chart.bundle.js')
    .copy('node_modules/chart.js/dist/Chart.bundle.min.js', 'public/node_modules/chart.js/dist/Chart.bundle.min.js')
