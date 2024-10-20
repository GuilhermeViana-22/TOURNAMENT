import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/auth.css',
            
                'resources/css/bracket.scss',
                'resources/js/app.js',
           
                'resources/js/bracket.js',
                'resources/js/custom.js',
                'resources/js/main.js',
                'resources/js/toast.js',
                'resources/js/sweetalert2.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '$': 'jquery',  // Define jQuery como alias para o símbolo $ globalmente
        },
    },
});
