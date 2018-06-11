<template>
    <li class="dropdown" style="margin-top: 5px;">
      <a class="nav-link icon" data-toggle="dropdown">
        <i class="fe fe-alert-octagon" style="font-size:16px;"></i>
        <span class="nav-unread" v-if="all_nots_count > 0">{{ all_nots_count }}</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="width: 280px;">
      <a @click="markAsRead(notification)" class="dropdown-item d-flex" v-for="notification in all_not" :key="notification.id">
        <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/18.jpg)"></span>
        <div>
          <strong>User name</strong> {{ notification.message }}
        </div>
      </a>
      <div class="dropdown-divider"  v-if="all_nots_count == 0"></div>
      <span href="#" class="dropdown-item text-center text-muted-dark" style="padding: 10px;">Accune notification</span>
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
