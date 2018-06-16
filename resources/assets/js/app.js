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
miniToastr.init({
  types: toastTypes
})

function toast({
  title,
  message,
  type,
  timeout,
  cb
}) {
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
Vue.component('reclamation', require('./components/reclamation.vue'));
//Vue.component('publicationPartagerParUtilisateur',require('./components/publicationPartagerParUtilisateur.vue'));
Vue.component('jaimecommentairecommenter', require('./components/jaimecommentairecommenter.vue'));
Vue.component('amie', require('./components/amie.vue'));
Vue.component('notification', require('./components/notification.vue'));
Vue.component('unreadnot', require('./components/unreadnot.vue'));
//Vue.component('modifierprofile',require('./components/modifierprofile.vue'));
Vue.component('chat', require('./components/chat.vue'));
Vue.component('downloadmemoire', require('./components/downloadMemoire.vue'))
Vue.component('onlineuser', require('./components/OnlineUser.vue'));
Vue.component('sondage', require('./components/sondage.vue'));
//Vue.component('sondagekbir', require('./components/sondagekbir.vue'));
Vue.component('suivie', require('./components/suivie.vue'));
Vue.component('unreadnotadmin', require('./components/unreadnotadmin.vue'));
Vue.component('downloadpdf', require('./components/downloadPdf.vue'));
Vue.component('chat-messages', require('./components/ChatRoomMessages.vue'));
Vue.component('chat-form', require('./components/ChatForm.vue'));
import {
  store
} from './store';

export const app = new Vue({
  el: '#app',

  store,

  data: {
    message: 'djamel',
    messages: []

  },
  created() {

    this.fetchMessages();
    Echo.private('chatroom')
      .listen('MessageRomeSent', (e) => {
        console.log(e);
        this.messages.push({
          message: e.message.message,
          user: e.user
        });
      });

    Echo.join("Online")
      .here(users => {
        // this.onlineUsers = users;
        this.$store.state.onlineUsers = users;
        // users.forEach(val=>this.$toaster.success(val.name+' is online'))

        console.log(users);
      })
      .joining(user => {
        //  this.onlineUsers.push(user);
        this.$store.state.onlineUsers.push(user);
        //this.$toaster.warning(user.name+' is joined ');
      })
      .leaving(user => {
        /*  this.onlineUsers = this.onlineUsers.filter(u => {
          u != user;
        });*/
        this.$store.state.onlineUsers = this.$store.state.onlineUsers.filter(
          u => {
            u != user;
          }
        );
        //  this.$toaster.success(user.name+' is offline');
      });


  },

  methods: {
    fetchMessages() {
      axios.get('/messages').then(response => {
        this.messages = response.data;
      });
    },

    addMessage(message) {
     // axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      this.messages.push(message);

      axios.post('/messages', message).then(response => {
        console.log(response.data);
      });
    }
  }
});