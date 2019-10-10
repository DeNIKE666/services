const mix = require('laravel-mix');

mix.styles([
    'resources/css/atlantis/bootstrap.min.css',
    'resources/css/atlantis/atlantis.css',
    'resources/css/atlantis/fonts.css',
], 'public/assets/atlantis/css/atlantis.css').version();

mix.styles([
    'resources/css/frontend/bootstrap-grid.css',
    'resources/css/frontend/style.css',
    'resources/css/frontend/blue.css',
    'resources/css/frontend/icons.css',
], 'public/assets/frontend/css/frontend.css').version();

mix.scripts([
    'resources/js/frontend/jquery-3.4.1.min.js',
    'resources/js/frontend/jquery-migrate-3.1.0.min.js',
    'resources/js/frontend/mmenu.min.js',
    'resources/js/frontend/tippy.all.min.js',
    'resources/js/frontend/simplebar.min.js',
    'resources/js/frontend/bootstrap-slider.min.js',
    'resources/js/frontend/bootstrap-select.min.js',
    'resources/js/frontend/snackbar.js',
    'resources/js/frontend/clipboard.min.js',
    'resources/js/frontend/counterup.min.js',
    'resources/js/frontend/magnific-popup.min.js',
    'resources/js/frontend/slick.min.js',
    'resources/js/frontend/custom.js',
], 'public/assets/frontend/js/frontend.js').version();

mix.scripts([
    'resources/js/atlantis/core/jquery.3.2.1.min.js',
    'resources/js/atlantis/core/bootstrap.min.js',
    'resources/js/atlantis/core/popper.min.js',
    'resources/js/atlantis/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js',
    'resources/js/atlantis/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js',
    'resources/js/atlantis/plugin/jquery-scrollbar/jquery.scrollbar.min.js',
    'resources/js/atlantis/plugin/moment/moment.min.js',
    'resources/js/atlantis/plugin/chart-js/chart.min.js',
    'resources/js/atlantis/plugin/jquery.sparkline/jquery.sparkline.min.js',
    'resources/js/atlantis/plugin/chart-circle/circles.min.js',
    'resources/js/atlantis/plugin/datatables/datatables.min.js',
    'resources/js/atlantis/plugin/bootstrap-notify/bootstrap-notify.min.js',
    'resources/js/atlantis/plugin/bootstrap-toggle/bootstrap-toggle.min.js',
    'resources/js/atlantis/plugin/jqvmap/jquery.vmap.min.js',
    'resources/js/atlantis/plugin/jqvmap/maps/jquery.vmap.world.js',
    'resources/js/atlantis/plugin/dropzone/dropzone.min.js',
    'resources/js/atlantis/plugin/fullcalendar/fullcalendar.min.js',
    'resources/js/atlantis/plugin/datepicker/bootstrap-datetimepicker.min.js',
    'resources/js/atlantis/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js',
    'resources/js/atlantis/plugin/bootstrap-wizard/bootstrapwizard.js',
    'resources/js/atlantis/plugin/jquery.validate/jquery.validate.min.js',
    'resources/js/atlantis/plugin/summernote/summernote-bs4.min.js',
    'resources/js/atlantis/plugin/select2/select2.full.min.js',
    'resources/js/atlantis/plugin/sweetalert/sweetalert.min.js',
    'resources/js/atlantis/plugin/owl-carousel/owl.carousel.min.js',
    'resources/js/atlantis/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js',
], 'public/assets/atlantis/js/atlantis.all.js').version();

mix.copy([
    'resources/js/atlantis/atlantis.min.js',
] , 'public/assets/atlantis')


mix.copy('resources/assets/atlantis/fonts', 'public/assets/atlantis/fonts')
mix.copy('resources/assets/atlantis/img', 'public/assets/atlantis/img')

mix.copy('resources/assets/frontend/webfonts', 'public/assets/frontend/webfonts')
mix.copy('resources/assets/frontend/img', 'public/assets/frontend/img')
mix.copy('resources/assets/frontend/plugins' , 'public/assets/frontend/js/plugins')

mix.js('resources/js/frontend/plugins.js', 'public/assets/frontend/js/plugins.js');

mix.js('resources/js/app.js', 'public/js');
