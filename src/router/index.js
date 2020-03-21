import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        component: () => import('../page/IndexPage.vue')
    },
    {
        path: '/basket',
        component: () => import('../page/BasketPage.vue')
    },
    {
        path: '/order',
        component: () => import('../page/OrderPage.vue')
    },
    {
        path: '/result',
        component: () => import('../page/ResultPage.vue')
    },
    {
        path: '/action',
        component: () => import('../page/ActionPage.vue')
    },
    {
        path: '/contact',
        component: () => import('../page/ContactPage.vue')
    }
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes,
    scrollBehavior() {
        window.scrollTo(0,0);
    }
})

export default router
