<template>

    <li class="notification dropdown" style="margin-top: 5px;">
      <a class="nav-link icon" data-toggle="dropdown">
        <i class="fe fe-bell" style="font-size:16px;"></i>
        <span class="nav-unread" v-if="all_nots_count > 0 ">{{ all_nots_count }}</span>
      </a>
      <div class="notification dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="width: 280px;">
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
  


<script>
export default {
  mounted() {
    this.get_unread();
  },

  methods: {
    get_unread() {
      axios.get("/get_unreadnot").then(response => {
        //   console.log(response);

        response.data.forEach(not => {
          //  console.log(not);
          //  console.log(not.data);
          let notification = {
            id: not.id,
            message: not.data.message,
            nom: not.data.nom,
            profile: not.data.profile,
            type: not.type
          };
          // console.log(notification)
          this.$store.commit("add_not", notification);
        });
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
