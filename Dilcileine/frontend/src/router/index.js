import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'

import routes from '@/router/routes.js';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/Login.vue')
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: () => import('../views/Dashboard.vue'),
      meta: {
        auth:true
      }
    },
    {
      path: '/user',
      name: 'user',
      component: () => import('../views/UserList.vue'),
      meta: {
        auth:true
      }
    },
    {
      path: '/addUser',
      name: 'addUser',
      component: () => import('../views/UserCreate.vue'),
      meta: {
        auth:true
      }
    },
    {
      path: '/editUser/:id',
      name: 'editUser',
      component: () => import('../views/UserEdit.vue'),
      meta: {
        auth:true
      }
    }
  ]
})

router.beforeEach(routes);

export default router
