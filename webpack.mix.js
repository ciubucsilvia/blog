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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');


mix.styles([
    'resources/admin/plugins/fontawesome-free/css/all.min.css',
    'resources/admin/plugins/daterangepicker/daterangepicker.css',
    'resources/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
    'resources/admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css',
    'resources/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
    'resources/admin/plugins/select2/css/select2.min.css',
    'resources/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',
    'resources/admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css',
    'resources/admin/dist/css/adminlte.min.css',
    'resources/admin/plugins/summernote/summernote-bs4.css',
    'resources/admin/mystyle.css'
], 'public/css/admin.css');

mix.scripts([
    'resources/admin/plugins/jquery/jquery.min.js',
    'resources/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'resources/admin/plugins/select2/js/select2.full.min.js',
    'resources/admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js',
    'resources/admin/plugins/moment/moment.min.js',
    'resources/admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js',
    'resources/admin/plugins/daterangepicker/daterangepicker.js',
    'resources/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js',
    'resources/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
    'resources/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
    'resources/admin/dist/js/adminlte.min.js',
    'resources/admin/dist/js/demo.js',
    'resources/admin/plugins/summernote/summernote-bs4.min.js',
    'resources/admin/myscript.js'
], 'public/js/admin.js');

mix.copy('resources/admin/dist/img', 'public/img');
mix.copy('resources/admin/plugins/fontawesome-free/webfonts', 'public/webfonts');
mix.copy('resources/admin/plugins/summernote/font', 'public/font');

mix.styles([
    'resources/blog/css/bootstrap.min.css',
    'resources/blog/css/font-awesome.min.css',
    'resources/blog/css/animate.min.css',
    'resources/blog/css/owl.carousel.css',
    'resources/blog/css/owl.theme.css',
    'resources/blog/css/owl.transitions.css',
    'resources/blog/css/style.css',
    'resources/blog/css/responsive.css'
    ], 'public/css/front.css');

mix.scripts([
    'resources/blog/js/jquery-1.11.3.min.js',
    'resources/blog/js/bootstrap.min.js',
    'resources/blog/js/owl.carousel.min.js',
    'resources/blog/js/jquery.stickit.min.js',
    'resources/blog/js/menu.js',
    'resources/blog/js/scripts.js'
    ], 'public/js/front.js');

mix.copy('resources/blog/fonts', 'public/fonts');
mix.copy('resources/blog/images', 'public/images');