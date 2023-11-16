import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export const hash = Math.floor(Math.random() * 90000) + 10000;
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/lane-filter.js', 'resources/js/vert-scroll.js'],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                entryFileNames: `heimerdinger` + hash + `.js`,
                chunkFileNames: `heimerdinger` + hash + `.js`,
                assetFileNames: `heimerdinger` + hash + `.[ext]`
            }
        }
    }
});
