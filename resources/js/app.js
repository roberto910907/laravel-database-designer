import { createApp } from 'vue';
import { createPinia } from 'pinia';
import { createRouter, createWebHistory } from 'vue-router';
import App from './App.vue';
import '../scss/app.scss';
import routes from './router';

const pinia = createPinia();
const app = createApp(App);

const router = createRouter({
    history: createWebHistory('/db-designer'),
    routes,
});

app.use(router);
app.use(pinia);
app.mount('#db-designer');
