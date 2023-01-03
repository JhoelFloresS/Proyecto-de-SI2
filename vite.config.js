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
                'resources/css/argon-dashboard-tailwind.css',
                'resources/css/nucleo-icons.css',
                'resources/css/nucleo-svg.css',
                'resources/js/argon-dashboard-tailwind.js',
                'resources/js/personalizacion/index.js',
            ],
            refresh: true,
        }),
    ],
});
