import './bootstrap';
import { createApp } from 'vue';
import {createRouter, createWebHistory } from 'vue-router';
//import VueAxios from 'vue-axios' ;
//import axios from 'axios';
import { routes } from './routes.js';
import AllTodo from './components/AllTodo.vue';
const router = createRouter({
    history: createWebHistory(),
    routes: routes
});
    const app = createApp(AllTodo);
    app.use(router);
  //  app.use(VueAxios, axios);
    app.mount('#app');
