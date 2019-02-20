
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('vue-multiselect/dist/vue-multiselect.min.css');
import VModal from 'vue-js-modal';
import Turbolinks from 'turbolinks';
import TurbolinksAdapter from 'vue-turbolinks';



window.Vue = require('vue');
Vue.use(VModal);
Turbolinks.start();


Vue.component('card-component', require('./components/Cards.vue').default);
Vue.component('menu-container', require('./modules/menu/MenuContainer.vue').default);
Vue.component('restau-group', require('./modules/Restaurants/RestauGroup.vue').default);


document.addEventListener('turbolinks:load', () => {
  var element = document.getElementById('app');
  if (element != null) {
    const app = new Vue({
      el: element
    });
  }
});

