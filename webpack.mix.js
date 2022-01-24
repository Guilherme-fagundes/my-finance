const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .sass('resources/views/conta/css/reset.scss', 'public/conta/css/styles.css').version()
    .sass('resources/views/conta/css/login.scss', 'public/conta/css/styles.css').version()
    .sass('resources/views/conta/css/esqueci-senha.scss', 'public/conta/css/styles.css').version()
    .sass('node_modules/bootstrap/scss/bootstrap.scss', 'public/conta/css/bootstrap/bootstrap.css').version()
