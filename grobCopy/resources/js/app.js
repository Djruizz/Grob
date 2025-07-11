import '../css/custom-styles.scss';  // importa tu SCSS personalizado

import { createApp } from 'vue'; 
import App from '../views/App/App.vue';
import router from './router';

import * as bootstrap from 'bootstrap'; // Importa JS completo de Bootstrap

const app = createApp(App);

app.use(router);

app.mount('#app');
