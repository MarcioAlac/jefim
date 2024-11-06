import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/css/app.css',  // Mantenha este se ainda estiver usando
                'public/css/user/user.css',  // Adicione seu arquivo CSS aqui
                'public/css/index.css',  // Adicione também este
 
            ],
            refresh: true,
        }),
    ],
    server: {
        watch: {
            usePolling: true,
        },
    },
});
