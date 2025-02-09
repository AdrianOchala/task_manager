import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { quasar, transformAssetUrls } from '@quasar/vite-plugin';
import i18n from 'laravel-vue-i18n/vite';

export default defineConfig({
    resolve: {
        alias: {
            '@': '/resources/js',
            '@Resources': '/resources/',
            '@Components': '/resources/js/components',
            '@Pages': '/resources/js/pages',
            '@Layouts': '/resources/js/layouts',
            '@Stores': '/resources/js/stores',
            '@Router': '/resources/js/router',
            '@Hooks': '/resources/js/hooks',
            '@Plugins': '/resources/js/plugins',
        }
    },
    server: {
        hmr: {
            host: 'localhost',
        }
    },
    plugins: [
        laravel({
            input: ['resources/js/app.js', 'resources/js/auth.js'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls,
            }
        }),
        quasar({
            sassVariables: '@/quasar-variables.scss',
        }),
        i18n(),
    ],
});
