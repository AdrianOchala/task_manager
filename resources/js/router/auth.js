import { createRouter, createWebHashHistory } from "vue-router";
import Layout from '../layouts/AuthLayout.vue';

const routes = [
    {
        path: '/',
        component: Layout,
        children: [
            {
                path: '',
                redirect: {name: 'login'},
            },
            {
                path: '/login',
                name: 'login',
                component: () => import('@Pages/Auth/TheLogin.vue'),
            },
            {
                path: '/register',
                name: 'register',
                component: () => import('@Pages/Auth/TheRegister.vue'),
            }
        ]
    }
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;
