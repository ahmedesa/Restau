
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('vue-multiselect/dist/vue-multiselect.min.css');
import VModal from 'vue-js-modal'


window.Vue = require('vue');
Vue.use(VModal)



Vue.component('card-component', require('./components/Cards.vue').default);
Vue.component('menu-container', require('./modules/menu/MenuContainer.vue').default);
Vue.component('restau-group', require('./modules/Restaurants/RestauGroup.vue').default);




const app = new Vue({
    el: '#app'
});
