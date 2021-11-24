const mix = require('laravel-mix');

//Register js
mix.js('resources/js/main.js', 'public/assets/js')

//Register css
mix.postCss('resources/css/main.css', 'public/assets/css')

