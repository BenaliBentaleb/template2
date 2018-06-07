<template>
 <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" >
            <span class="glyphicon glyphicon-globe"></span>
                 
                   admin <span class="badge">{{ all_nots_count }}</span> <span class="caret"></span>
                                   
             </a>

            <ul class="dropdown-menu" role="menu">

                 
              
                <li v-for="notification in all_not" :key="notification.id">
                <a  @click="markAsRead(notification)" >
                   
                    <small >{{ notification.message }}</small>
                    
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

        


      axios.get("/get_unreadAdminNot").then(response => {
     //   console.log(response);

        response.data.forEach(not => {
        //  console.log(not);
        //  console.log(not.data);
          let notification = {
            id:not.id,
            message:not.data.message,
            nom:not.data.nom,
            url:not.data.url,
            type:not.type
        }
        console.log(notification)
          this.$store.commit("add_admin_not", notification);
        });
      });
    },
    markAsRead(notification) {
   
       // console.log(notification);
       
      axios
        .post("/admin/notification/read/" + notification.id)
        .then(response => {
              console.log(response);
          window.location.href = notification.url ;
        })
        .catch(err => {
          console.log(err);
        });
    }
  },
  computed: {
    all_nots_count() {
      return this.$store.getters.all_admin_nots_count;
    },
    all_not() {
      return this.$store.getters.all_admin_nots;
    }
  }
};
</script>

<style>
</style>
