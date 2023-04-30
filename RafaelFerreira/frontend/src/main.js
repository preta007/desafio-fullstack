import { createApp } from 'vue'
import { createPinia } from 'pinia';

import App from './App.vue'
import router from './router'

import PrimeVue from 'primevue/config';

import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"

import "primevue/resources/themes/lara-light-indigo/theme.css";
import "primevue/resources/primevue.min.css";

import 'primeicons/primeicons.css';

import "./assets/global.css"

const app = createApp(App)
const pina = createPinia();

app.use(pina)
app.use(router)
app.use(PrimeVue);

app.mount('#app')
