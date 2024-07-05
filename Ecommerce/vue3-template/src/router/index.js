import { createRouter, createWebHistory } from 'vue-router';
import routes from './routes';
import { useAuthStore } from '@/router/authStore';

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from, next) => {
    const authStore = useAuthStore();
    if (to.meta.requiresAuth) {
        if (authStore.isAuthenticated()) {
            next();
        } else {
            next('/login');
        }
    } else {
        next();
    }
});

export default router;
