import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import {optimizeCssModules} from "vite-plugin-optimize-css-modules";

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        optimizeCssModules()
    ],
});
