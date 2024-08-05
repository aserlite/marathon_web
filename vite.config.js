import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/login.css','resources/css/acc.css', 'resources/css/acc.css', 'resources/css/salle.css','resources/css/register.css','resources/scss/app.scss', 'resources/js/app.js','resources/js/burger.js','resources/css/oeuvre.css'],
            refresh: true,
        }),
    ],
});
