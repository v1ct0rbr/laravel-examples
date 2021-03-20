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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.scripts('node_modules/@fortawesome/fontawesome-free/js/all.min.js', 'public/js/fontawesome.all.min.js').postCss(
    'node_modules/@fortawesome/fontawesome-free/css/all.min.css', 'public/css/fontawesome.all.min.css');

mix.scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', 'public/js/bootstrap.bundle.min.js').postCss(
    'node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap.min.css'
);


