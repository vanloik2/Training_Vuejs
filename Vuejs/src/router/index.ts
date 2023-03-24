import { createRouter, createWebHistory } from 'vue-router'
import Layout from '../views/layout/Layout.vue'
import HomePage from '../views/HomePage.vue'
import Login from './../views/auth/Login.vue'
import Register from './../views/auth/Register.vue'

/** Auth Guards  */
const requiredAuth = (to, from, next) => {
  const token = localStorage.getItem('AccessToken')
  
  if (!token) next({ name: "login", params: {} })
  else
    next()
}

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/login',
      name: 'login',
      component: Login
    },
    {
      path: '/register',
      name: 'register',
      component: Register
    },
    {
      path: '/',
      name: 'layout',
      component: Layout,
      beforeEnter: requiredAuth,
      children: [
        {
          path: '/',
          name: 'home-page',
          component: HomePage,
        }
      ]
    },
  ]
})
export default router
