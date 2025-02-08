import './bootstrap';
import app from './vueConfig';
import router from '@Router/index';

app.use(router);

app.mount('#app')
