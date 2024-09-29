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

// FRONT
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

// ADMIN 
mix.copy('resources/tinydash/assets/avatars/*', 'public/tinydash/assets/avatars');
mix.copy('resources/tinydash/assets/images/*', 'public/tinydash/assets/images');
mix.copy('resources/tinydash/assets/products/*', 'public/tinydash/assets/products');
mix.copy('resources/tinydash/fonts/*', 'public/tinydash/fonts');

mix.combine([
    'resources/tinydash/css/simplebar.css', 
    'resources/tinydash/css/feather.css',
    'resources/tinydash/css/dataTables.bootstrap4.css',
    'resources/tinydash/css/daterangepicker.css',
    // 'resources/tinydash/css/*.css'
], 'public/tinydash/css/app.css');

mix.copy('resources/tinydash/css/app-light.css', 'public/tinydash/css/app-light.css');
mix.copy('resources/tinydash/css/app-dark.css', 'public/tinydash/css/app-dark.css');

mix.combine([
    'resources/tinydash/js/jquery.min.js',
    'resources/tinydash/js/popper.min.js',
    'resources/tinydash/js/moment.min.js',
    'resources/tinydash/js/bootstrap.min.js',
    'resources/tinydash/js/simplebar.min.js',
    'resources/tinydash/js/daterangepicker.js',
    'resources/tinydash/js/jquery.stickOnScroll.js',
    'resources/tinydash/js/tinycolor-min.js',
    'resources/tinydash/js/config.js',
    'resources/tinydash/js/d3.min.js',
    'resources/tinydash/js/topojson.min.js',
    'resources/tinydash/js/datamaps.all.min.js',
    'resources/tinydash/js/datamaps-zoomto.js',
    'resources/tinydash/js/datamaps.custom.js',
    'resources/tinydash/js/Chart.min.js',
    'resources/tinydash/js/gauge.min.js',
    'resources/tinydash/js/jquery.sparkline.min.js',
    'resources/tinydash/js/apexcharts.min.js',
    'resources/tinydash/js/apexcharts.custom.js',
    'resources/tinydash/js/jquery.mask.min.js',
    'resources/tinydash/js/select2.min.js',
    'resources/tinydash/js/jquery.steps.min.js',
    'resources/tinydash/js/jquery.validate.min.js',
    'resources/tinydash/js/jquery.timepicker.js',
    'resources/tinydash/js/dropzone.min.js',
    'resources/tinydash/js/uppy.min.js',
    'resources/tinydash/js/quill.min.js',
    'resources/tinydash/js/apps.js',
    // 'resources/tinydash/js/*.js'
], 'public/tinydash/js/app.js');

// COMMON
mix.copy('resources/pagination/js/*', 'public/pagination/js');

mix.copy('resources/image-uploader/js/*', 'public/image-uploader/js');
mix.copy('resources/image-uploader/css/*', 'public/image-uploader/css');
mix.copy('resources/image-uploader/fonts/*', 'public/image-uploader/fonts');

mix.copy('resources/mdb/js/*', 'public/mdb/js');
mix.copy('resources/mdb/css/*', 'public/mdb/css');

// VERSION
if (mix.inProduction()) {
    mix.version();
}