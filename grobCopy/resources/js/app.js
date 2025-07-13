import '../css/custom-styles.scss'; // importa tu SCSS personalizado

import { createApp } from 'vue';
import App from '../views/App.vue';
import router from './router';

import 'bootstrap/dist/js/bootstrap.bundle.min.js';


const app = createApp(App);

app.use(router);

app.mount('#app');
