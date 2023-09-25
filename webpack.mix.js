const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
      require('postcss-import'),
      require('tailwindcss'),
   ]);

mix.css('resources/css/welcome.css', 'public/css');
mix.css('resources/css/pdf.css', 'public/css');
mix.css('resources/css/certificate.css', 'public/css');
mix.js('resources/js/certificate.js', 'public/js');
mix.js('resources/js/pdf.js', 'public/js');
mix.js('resources/js/script.js', 'public/js');

mix.disableNotifications();

