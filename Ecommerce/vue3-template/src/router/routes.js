export default [
    {
        path: '/',
        name: 'home',
        component: () => import('@/views/pages/HomePage.vue')
    },
    {
        path: '/product/detail/:slug',
        name: 'detail',
        component: () => import('@/views/pages/DetailProduct.vue')
    },
    {
        path: '/login',
        name: 'login',
        component: () => import('@/views/auth/LoginPage.vue')
    },
    {
        path: '/register',
        name: 'register',
        component: () => import('@/views/auth/RegisterPage.vue')
    },
    {
        path: '/forgot-password',
        name: 'forgot-password',
        component: () => import('@/views/auth/ForgotPassword.vue')
    },
    {
        path: '/reset-password',
        name: 'reset-password',
        component: () => import('@/views/auth/ResetPassword.vue')
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: () => import('@/views/protected/DashboardPage.vue'),
        meta: { requiresAuth: true }
    },
    {
        path: '/products',
        name: 'products',
        component: () => import('@/views/protected/ProductsPage.vue'),
        meta: { requiresAuth: true }
    },
    {
        path: '/products/create',
        name: 'create-product',
        component: () => import('@/views/protected/CreateProduct.vue'),
        meta: { requiresAuth: true }
    },
    {
        path: '/products/update/:slug/:id',
        name: 'update-product',
        component: () => import('@/views/protected/UpdateProduct.vue'),
        meta: { requiresAuth: true }
    },
    {
        path: '/store/setting',
        name: 'setting-store',
        component: () => import('@/views/protected/SettingStore.vue'),
        meta: { requiresAuth: true }
    },
    {
        path: '/cocktails',
        name: 'coctails-list',
        component: () => import('@/views/cocktail/CocktailList.vue'),
    },
    {
        path: '/:pathMatch(.*)*',
        component: () => import('@/components/global/ErrorLink.vue')
    },
]