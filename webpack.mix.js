const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/home.js", "public/js")
    .js("resources/js/events/index.js", "public/js/events")
    .js("resources/js/posts/index.js", "public/js/posts")
    .js("resources/js/posts/show.js", "public/js/posts")
    .js("resources/js/questions/new.js", "public/js/questions")
    .js("resources/js/questions/show.js", "public/js/questions")
    .js("resources/js/users/show.js", "public/js/users")
    .postCss("resources/css/app.css", "public/css", [
        require("postcss-import"),
        require("tailwindcss"),
        require("autoprefixer"),
    ])
    .sass("resources/scss/fontawesome.scss", "public/css")
    .copy(
        "node_modules/@fortawesome/fontawesome-free/webfonts",
        "public/webfonts"
    );

if (mix.inProduction()) {
    mix.version();
}
