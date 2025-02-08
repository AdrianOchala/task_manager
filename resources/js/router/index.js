import { createRouter, createWebHashHistory } from "vue-router";
import Layout from '../layouts/MainLayout.vue';

const routes = [
    {
        path: '/',
        component: Layout
    }
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;
