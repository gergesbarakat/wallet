import  'vite';
import 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                '/resources/css/app.css',
                '/resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
