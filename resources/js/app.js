import axios from 'axios';
import './bootstrap';
import app from './vueConfig';
import router from '@Router/index';

axios.defaults.baseURL = '/api'

app.use(router);

app.mount('#app')
