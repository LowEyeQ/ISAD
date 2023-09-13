const mix = require('laravel-mix');

mix.js('resources/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css');
