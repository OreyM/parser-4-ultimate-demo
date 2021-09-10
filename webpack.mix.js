const mix = require('laravel-mix')

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
mix.js('app/Parser/Frontend/UI/Vue/Parser/main.js', 'public/js/vue/parser').vue()
mix.js('app/Parser/Frontend/UI/Vue/ParserData/main.js', 'public/js/vue/parser-data').vue()
mix.sass('resources/scss/style.scss', 'public/css')
