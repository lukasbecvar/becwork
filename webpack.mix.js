const mix = require('laravel-mix');

//Register
mix.js('resources/js/main.js', 'public/assets/js')
mix.postCss('resources/css/main.css', 'public/assets/css')
