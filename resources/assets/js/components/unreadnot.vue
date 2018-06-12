<template>


  <li class=" dropdown" style="margin-top: 5px;">

    <a class="nav-link icon" data-toggle="dropdown">
      <i class="fe fe-bell" style="font-size:16px;"></i>
      <span class="nav-unread">{{ all_nots_count }}</span>
    </a>
    <div class=" dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="width: 280px;" v-if="all_nots_count > 0 ">
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



<script>
  export default {
    data() {
      return {};
    },
    mounted() {
      this.get_unread();
    },

    methods: {
      get_unread() {
        axios.get("/get_unreadnot").then(response => {
             console.log(response.data);
             console.log( typeof response.data);

        /*  response.data.forEach(not => {
            //  console.log(not);
            //  console.log(not.data);
            let notification = {
              id: not.id,
              message: not.data.message,
              user: not.data.user,
              profile: not.data.profile,
              type: not.type
            };
            // console.log(notification)
            this.$store.commit("add_not", notification);
          });
*/
    for (const key in response.data) {
          console.log(key);
            console.log(response.data[key]);
           let notification = {
              id: response.data[key].id,
              message: response.data[key].data.message,
              user: response.data[key].data.user,
              profile: response.data[key].data.profile,
              type: response.data[key].type
            };
            // console.log(notification)
            this.$store.commit("add_not", notification);
        }

        });


    
      },
      markAsRead(notification) {
        // console.log(notification);

        axios
          .post("/notification/read/" + notification.id)
          .then(response => {
            window.location.href = notification.profile;
          })
          .catch(err => {
            console.log(err);
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

<style scoped>
</style>