const mix = require('laravel-mix');

mix.sass('src/scss/style.scss', 'dist/css')
   .options({
        postCss: [
            require('tailwindcss'),
            require('autoprefixer'),
        ],
    })
   .sourceMaps();
