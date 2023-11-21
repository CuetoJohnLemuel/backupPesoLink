import { createRouter, createWebHistory } from 'vue-router'
import applicanthome from '../views/ApplicantHome.vue'
import ApplicantRegistration from '../views/ApplicantRegistration.vue'
import test from '../views/test.vue'
const routes = [
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
    path: '/applicantregistration',
    component: ApplicantRegistration
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
