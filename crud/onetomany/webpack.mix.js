const { scripts } = require("laravel-mix");
const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js").postCss(
    "resources/css/app.css",
    "public/css",
    [
        //
    ]
);

mix.scripts(
    "node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js",
    "public/js/ckeditor.js"
)
    .scripts(
        "node_modules/bootstrap/dist/js/bootstrap.min.js",
        "public/js/bootstrap.min.js"
    )
    .scripts(
        "node_modules/bootstrap/dist/js/bootstrap.min.js.map",
        "public/js/bootstrap.min.js.map"
    )
    .postCss(
        "node_modules/bootstrap/dist/css/bootstrap.min.css",
        "public/css",
        [
            //
        ]
    )
    .scripts(
        "node_modules/@fortawesome/fontawesome-free/js/all.min.js",
        "public/js/fontawesome-all.js"
    )
    .postCss(
        "node_modules/@fortawesome/fontawesome-free/css/all.min.css",
        "public/css/fontawesome-all.css"
    );
