<template>
    <li class="dropdown" style="margin-top: 5px;">
      <a class="nav-link icon" data-toggle="dropdown">
        <i class="fe fe-alert-octagon" style="font-size:16px;"></i>
<<<<<<< HEAD
        <span class="nav-unread" v-if="all_nots_count > 0"><!-- {{ all_nots_count }} --></span>
=======
        <span class="nav-unread" >{{ all_nots_count }}</span>
>>>>>>> 7164d444c562c985f83f130baecb0a6ea3e702a1
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="width: 280px;" v-if="all_nots_count > 0">
      <a @click="markAsRead(notification)" class="dropdown-item d-flex" v-for="notification in all_not" :key="notification.id">
        <span class="avatar mr-3 align-self-center" v-bind:style="{backgroundImage: 'url('+ notification.user.profile.photo_profile +')'}"></span>
         <span>
          {{ notification.message }}

        </span>
        <br>
        
      </a>
      
      </div>
    </li>

</template>
 <!-- <li class="dropdown">
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
    </li> -->

<script>
export default {
  mounted() {
    this.get_unread();
  },

  methods: {
    get_unread() {

        


      axios.get("/get_unreadAdminNot").then(response => {
     //   console.log(response);

     /*   response.data.forEach(not => {
        //  console.log(not);
        //  console.log(not.data);
          let notification = {
            id:not.id,
            message:not.data.message,
            user:not.data.user,
            url:not.data.url,
            type:not.type
        }
        console.log(notification)
          this.$store.commit("add_admin_not", notification);
        });*/
        for (const key in response.data) {
          console.log(key);
            console.log(response.data[key]);
           let notification = {
              id: response.data[key].id,
              message: response.data[key].data.message,
              user: response.data[key].data.user,
              url: response.data[key].data.url,
              type: response.data[key].type
            };
            // console.log(notification)
            this.$store.commit("add_admin_not", notification);
        }

        
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
