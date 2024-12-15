import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', // CSS principal
                'resources/css/styles.css', // Estilos adicionales
                'resources/js/app.js' // Scripts de la aplicación
            ],
            refresh: true,
        }),
    ],
});
