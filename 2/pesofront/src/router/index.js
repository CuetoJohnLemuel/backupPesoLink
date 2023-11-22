import { createRouter, createWebHistory } from 'vue-router'
import applicanthome from '../views/ApplicantHome.vue'
import RegisterApplicant from '../components/RegisterApplicant.vue'
import test from '../views/test.vue'
import login from '../views/Login.vue'
import page from '../views/IndexPage.vue'
const routes = [
  {
    path: '/',
    component: login
  },
  {
    path: '/applicanthome',
    name: 'home',
    component: applicanthome
  },
  {
    path:'/test',
    component: test
  },
  {
    path: '/registerapplicant',
    component: RegisterApplicant
  },

  {
    path: '/page',
    component: page
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
