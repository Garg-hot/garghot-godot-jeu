import { createRouter, createWebHistory } from 'vue-router';
import Categorie from '../components/templates/Categorie.vue';
import Plat from '../components/templates/Plat.vue';

const routes = [
  { path: '/', component: Plat },
  { path: '/categorie', component: Categorie },
  { path: '/plat', component: Plat },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
