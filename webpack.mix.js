const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')  // ระบุโฟลเดอร์ปลายทางสำหรับไฟล์ JavaScript
    .postCss('resources/css/app.css', 'public/css')  // ระบุโฟลเดอร์ปลายทางสำหรับไฟล์ CSS
    
