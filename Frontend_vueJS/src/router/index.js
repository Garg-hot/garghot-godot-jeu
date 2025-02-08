import { createRouter, createWebHistory } from 'vue-router';
import Categorie from '../components/templates/Categorie.vue';
import Plat from '../components/templates/Plat.vue';

const routes = [
  { 
    path: '/', 
    redirect: '/plat'
  },
  { 
    path: '/categorie', 
    name: 'categorie',
    component: Categorie 
  },
  { 
    path: '/plat', 
    name: 'plat',
    component: Plat 
  },
  {
    path: '/:pathMatch(.*)*',
    redirect: '/plat'
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
