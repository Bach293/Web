import { createApp } from 'vue'
import App from './App.vue'
import { createPinia } from 'pinia'
import router from './router/index'
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'bootstrap-icons/font/bootstrap-icons.css'
import Toast from "vue-toastification"
import "vue-toastification/dist/index.css"
import '@/assets/css/detail-product.css'
import '@/assets/css/index.css'
import '@/assets/css/style.css'
import CKEditor from '@ckeditor/ckeditor5-vue'
import i18n from '@/i18n';
import axios from "axios";

window.axios = axios

const app = createApp(App)

const pinia = createPinia()

app.use(pinia)
app.use(router)
app.use(Toast)
app.use(CKEditor)
app.use(i18n);
app.mount('#app')
