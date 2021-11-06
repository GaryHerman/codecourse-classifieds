require('./bootstrap');

// Vue.js installation (allowing for support of livewire in the future by NOT using Laravel UI - manual install only)
// See the following for more infomration as needed: https://stackoverflow.com/questions/63853750/how-to-install-vue-js-in-laravel-8
window.Vue = require('vue').default;

Vue.component('payment-form', require('./components/Payment.vue').default);
Vue.component('listing-search', require('./components/Search.vue').default);

const app = new Vue({
    el: '#app',
});
