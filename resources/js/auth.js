import './bootstrap';
import app from './vueConfig';
import router from '@Router/auth';

app.use(router);

app.mount('#app')
