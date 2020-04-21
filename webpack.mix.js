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

mix.styles([
    'public/backend/vendors/bootstrap/dist/css/bootstrap.min.css',
    'public/backend/vendors/font-awesome/css/font-awesome.min.css',
    'public/backend/vendors/nprogress/nprogress.css',
    'public/backend/vendors/google-code-prettify/bin/prettify.min.css',
    'public/backend/vendors/toastr/toastr.css',
    'public/backend/build/css/custom.min.css'
], 'public/css/backend.css')
    .copy([
        'public/backend/vendors/bootstrap/fonts/',
        'public/backend/vendors/font-awesome/fonts/'
    ], 'public/fonts');

mix.scripts([
    'public/backend/vendors/jquery/dist/jquery.min.js',
    'public/backend/vendors/bootstrap/dist/js/bootstrap.min.js',
    'public/backend/vendors/fastclick/lib/fastclick.js',
    'public/backend/vendors/nprogress/nprogress.js',
    'public/backend/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js',
    'public/backend/vendors/jquery.hotkeys/jquery.hotkeys.js',
    'public/backend/vendors/google-code-prettify/src/prettify.js',
    'public/backend/vendors/toastr/toastr.min.js',
    'public/backend/build/js/custom.min.js'
], 'public/js/backend.js');
