
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueNotifications from 'vue-notifications'
import swal from 'sweetalert'
import miniToastr from 'mini-toastr'
const toastTypes = {
    success: 'success',
    error: 'error',
    info: 'info',
    warn: 'warn'
  }
  miniToastr.init({types: toastTypes})

  function toast ({title, message, type, timeout, cb}) {
   // return miniToastr[type](message, title, timeout, cb)
   return swal(title, message, type)
  }
  const options = {
    success: toast,
    error: toast,
    info: toast,
    warn: toast
  }
    

Vue.use(VueNotifications, options)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('jaime', require('./components/jaime.vue'));
//Vue.component('commentaire',require('./components/commentaire.vue'));
Vue.component('reclamation',require('./components/reclamation.vue'));
//Vue.component('publicationPartagerParUtilisateur',require('./components/publicationPartagerParUtilisateur.vue'));
Vue.component('jaimecommentairecommenter',require('./components/jaimecommentairecommenter.vue'));
Vue.component('amie',require('./components/amie.vue'));
Vue.component('notification',require('./components/notification.vue'));
Vue.component('unreadnot',require('./components/unreadnot.vue'));

import {store} from './store';

const app = new Vue({
    el: '#app',
    store,
    
    data: {
        message: 'djamel'
       
      }
});
