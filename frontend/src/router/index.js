import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '',
    name: 'home',
    component: HomeView
  },
  {
    path: '/auth',
    name: 'sign in',
    component: () => import('../views/AuthView.vue')
  },
  {
    path: '/registr',
    name: 'sign up',
    component: () => import('../views/RegistrationView.vue')
  },
  {
    path: '/admin',
    name: 'admin page',
    component: () => import('../views/AdminView.vue')
  },
  {
    path: '/buildings',
    name: 'buildings of university',
    component: () => import('../views/BuildingsListView.vue')
  },
  {
    path: '/lections',
    name: 'lections cabinets',
    component: () => import('../views/LecAuditListView.vue')
  },
  {
    path: '/ierarchy',
    name: 'ierarchy list of cabinets',
    component: () => import('../views/IerarchyListView.vue')
  },
  {
    path: '/student',
    name: 'student home page',
    component: () => import('../views/StudentHomeView.vue')
  },
  {
    path: '/user',
    name: 'user information',
    component: () => import('../views/UserInfoView.vue')
  },
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
