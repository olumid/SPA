
import Vue from 'vue';


import App from './components/App.vue';

import router from './router';

const app = new Vue({

    el: '#root',

    components: { App },

    template: '<app></app>',

    router

})

