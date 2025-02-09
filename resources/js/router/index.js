import { createRouter, createWebHashHistory } from "vue-router";
import Layout from '../layouts/MainLayout.vue';

const routes = [
    {
        path: '/',
        component: Layout,
        children: [
            {
                path: '',
                redirect: {name: 'dashboard'},
            },
            {
                path:'/dashboard',
                name: 'dashboard',
                component: () => import('@Pages/TheDashboard.vue')
            },
            {
                path: '/tasks',
                name: 'tasks',
                component: () => import('@Pages/tasks/TheTasks.vue')
            }
        ]
    }
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;
