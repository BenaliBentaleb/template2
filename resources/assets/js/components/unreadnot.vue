<template>

    <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" >
            <span class="glyphicon glyphicon-globe"></span>
                 
                   Notifications <span class="badge">{{ all_nots_count }}</span> <span class="caret"></span>
                                   
             </a>

            <ul class="dropdown-menu" role="menu">

                 
              
                <li v-for="notification in all_not" :key="notification.id">
                <a  @click="markAsRead(notification)" >
                   
                    <small>{{ notification.message }}</small>
                </a>
            </li>
            <li v-if="all_nots_count == 0">
               Accune notification 
            </li>
           </ul>
    </li>

</template>



<script>
export default {
  mounted() {
    this.get_unread();
  },

  methods: {
    get_unread() {
      axios.get("/get_unreadnot").then(response => {
        console.log(response);
       
          response.data.forEach(not => {
            console.log(not);
            console.log(not.data);
            // commit --- pour get a mutation data in store.js
            this.$store.commit("add_not", not.data);
          });
       
      });
    },
    markAsRead(notification) {
      let data = {
        id: notification.id
      };
      axios.post("/notification/read", data).then(response => {
        window.location.href = notification.profile;
      });
    }
  },
  computed: {
    all_nots_count() {
      return this.$store.getters.all_nots_count;
    },
    all_not() {
      return this.$store.getters.all_nots;
    }
  }
};
</script>