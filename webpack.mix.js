const mix = require('laravel-mix');

mix.setPublicPath('dist');

mix.sass('src/scss/style.scss', 'dist/css')
   .options({
        processCssUrls: false
    })
   .sourceMaps(false);
