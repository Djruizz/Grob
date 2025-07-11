import { createRouter, createWebHistory } from 'vue-router';

// Importa los componentes que serán páginas
import PublicLayout from '../../views/PublicLayout.vue';
import Home from '../../views/PublicViews/HomeView.vue';
import ServicesView from '../../views/PublicViews/ServicesView.vue';
import ProductsView from '../../views/PublicViews/ProductsView.vue';
import AboutView from '../../views/PublicViews/AboutView.vue';
import LocationsView from '../../views/PublicViews/LocationsView.vue';

import AdminLayout from '../../views/AdminLayout.vue';
import AdminDashboard from '../../views/AdminViews/AdminDashboard.vue';
import AdminProducts from '../../views/AdminViews/AdminProducts.vue';
import AdminServices from '../../views/AdminViews/AdminServices.vue';

const routes = [
  {
    path: '/',
    component: PublicLayout,
    children: [
      {
        path: '',
        name: 'Home',
        component: Home
      },
      {
        path: '/services',
        name: 'Services',
        component: ServicesView
      },
      {
        path: '/products',
        name: 'Products',
        component: ProductsView
      },
      {
        path: '/catalogue',
        name: 'Catalogue',
        component: LocationsView
      },
      {
        path: '/about',
        name: 'About',
        component: AboutView
      },
      {
        path: '/locations',
        name: 'Locations',
        component: LocationsView
      },
      {
        path: '/contact',
        name: 'Contact',
        component: LocationsView
      },
    ],
  },
  
  {
    path: '/admin',
    component : AdminLayout,
    meta: {requiresAuth: true},
    children: [
      {
        path:'',
        name: 'AdminDashboard',
        component: AdminDashboard,
      },
    //   {
    //     path: 'locations',
    //     component: () => import('../../views/AdminLocations.vue')
    //   },
      {
        path:'products',
        component: AdminProducts
      },
      {
        path:'services',
        component: AdminServices
      },
    ]
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
