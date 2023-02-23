const mix = require('laravel-mix');
const { js } = require("laravel-mix");

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

mix
    .sass('resources/views/home/css/home.scss', 'public/home/css/style.css').version()
    .sass('resources/views/conta/css/reset.scss', 'public/conta/css/styles.css').version()
    .sass('resources/views/conta/css/login.scss', 'public/conta/css/styles.css').version()
    .sass('resources/views/conta/css/esqueci-senha.scss', 'public/conta/css/styles.css').version()
    .sass('resources/views/conta/css/nova-conta.scss', 'public/conta/css/styles.css').version()
    .sass('resources/views/conta/css/conta-header.scss', 'public/conta/css/styles.css').version()
    .sass('resources/views/conta/css/meu-perfil.scss', 'public/conta/css/styles.css').version()
    .sass('resources/views/conta/css/assinatura.scss', 'public/conta/css/styles.css').version()
    .sass('resources/views/conta/css/home.scss', 'public/conta/css/styles.css').version()
    .sass('resources/views/conta/css/editar-lancamento.scss', 'public/conta/css/styles.css').version()
    .sass('resources/views/conta/css/todas-carteiras.scss', 'public/conta/css/styles.css').version()
    .sass('resources/views/conta/css/abrir-carteira.scss', 'public/conta/css/styles.css').version()
    .sass('resources/views/conta/css/listar-categorias.scss', 'public/conta/css/styles.css').version()
    .sass('node_modules/bootstrap/scss/bootstrap.scss', 'public/conta/css/bootstrap/bootstrap.css').version()


    .js('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/conta/js/bootstrap/bootstrap.bundle.js').version();


//tailwind
mix.
    js("resources/js/app.js", "public/js")
    .postCss("resources/css/app.css", "public/css", [
        require("tailwindcss"),
    ]);

    //Admin
    mix
        .sass('resources/views/admin/scss/reset.scss', 'public/assets/admin/css/style.css').version()
        .sass('resources/views/admin/scss/login.scss', 'public/assets/admin/css/style.css').version()
        .sass('resources/views/admin/scss/header.scss', 'public/assets/admin/css/style.css').version()
        .sass('resources/views/admin/scss/users.scss', 'public/assets/admin/css/style.css').version();
