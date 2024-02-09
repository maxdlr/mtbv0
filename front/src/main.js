import { createApp } from 'vue'
import App from './App.vue'
import { createRouter, createWebHashHistory, createWebHistory } from 'vue-router'
import 'bootstrap'
import { BootstrapIconsPlugin } from 'bootstrap-icons-vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import './assets/main.scss'
import PageHome from '@/components/4-template/PageHome.vue'
import PageAdmin from '@/components/4-template/PageAdmin.vue'

const Home = { template: PageHome }
const Admin = { template: PageAdmin }

const routes = [
  {
    path: '/',
    name: 'home',
    component: () => import('@/components/4-template/PageHome.vue')
  },
  {
    path: '/admin',
    name: 'admin',
    component: () => import('@/components/4-template/PageAdmin.vue')
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router

const app = createApp(App)
app.use(BootstrapIconsPlugin)
app.use(router)
app.mount('#app')
