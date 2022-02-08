const mix = require('laravel-mix');
require('@tinypixelco/laravel-mix-wp-blocks');
require('laravel-mix-copy-watched');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Sage application. By default, we are compiling the Sass file
 | for your application, as well as bundling up your JS files.
 |
 */

mix.setPublicPath('./public')
  .browserSync({
    proxy: 'http://changeme.test',
    open: false,
    cors: true,
  });

mix
  .options({processCssUrls: false,})
  .postCss('resources/styles/app.pcss', 'dist/styles', [
    require('postcss-import'),
    require('tailwindcss'),
    require('postcss-nested'),
    require('postcss-custom-properties'),
    require('autoprefixer'),
  ]);

mix
  .js('resources/scripts/app.js', 'dist/scripts')
  .js('resources/scripts/customizer.js', 'dist/scripts')
  .blocks('resources/scripts/editor.js', 'dist/scripts')
  .extract();

mix
  .copyWatched('resources/images/**', 'public/images', { base: 'resources/images' })
  .copyWatched('resources/fonts/**', 'public/fonts', { base: 'resources/images' });

if (mix.inProduction()) {
  mix.sourceMaps();
  mix.version();
}

mix.autoload({
  jquery: ['$', 'window.jQuery'],
});
