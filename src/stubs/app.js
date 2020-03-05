import { InertiaApp } from '@inertiajs/inertia-vue';
import Vue from 'vue';

import axios from 'axios';

Vue.use(InertiaApp);

const app = document.getElementById('app');

Vue.prototype.$http = axios;

new Vue({
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name => require(`./Pages/${name}`).default
            }
        })
}).$mount(app);
