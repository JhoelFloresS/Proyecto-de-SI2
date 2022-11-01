import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/dashboard.css',
                'resources/css/landing.css',
                'resources/js/landing.js',
                'resources/css/formulario.css',
                'resources/js/formulario.js',
                'resources/css/credit-card.css',
                'resources/js/credit-card.js',
            ],
            refresh: true,
        }),
    ],
});
