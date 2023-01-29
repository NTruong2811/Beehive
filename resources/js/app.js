import './bootstrap';

import { createApp } from 'vue';
import { createRouter,createWebHistory } from 'vue-router';
import routes from './routes';
import App from "./App.vue"
import 'bootstrap'; 
import 'bootstrap/dist/css/bootstrap.min.css';

const router = createRouter({
    history:createWebHistory(),
    routes
})

const app = createApp(App);
app.use(router);
app.mount('#app');