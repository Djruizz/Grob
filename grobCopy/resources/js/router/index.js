import { createRouter, createWebHistory } from 'vue-router';

// Importa los componentes que serán páginas
import Home from '../../views/HomeView.vue';
import ServicesView from '../../views/ServicesView.vue';
import ProductsView from '../../views/ProductsView.vue';
import AboutView from '../../views/AboutView.vue';
import LocationsView from '../../views/LocationsView.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/Services',
    name: 'Services',
    component: ServicesView
  },
  {
    path: '/Products',
    name: 'Products',
    component: ProductsView
  },
  {
    path: '/Catalogue',
    name: 'Catalogue',
    component: LocationsView
  },
  {
    path: '/About',
    name: 'About',
    component: AboutView
  },
  {
    path: '/Locations',
    name: 'Locations',
    component: LocationsView
  },
  {
    path: '/Contact',
    name: 'Contact',
    component: LocationsView
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
