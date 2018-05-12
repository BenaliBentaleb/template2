<template>
   <span class="avatar-status bg-green" v-if="checkUser()"></span>
    <span class="avatar-status bg-red" v-else></span>
</template>

<script>
export default {
props: ['friend', ],

methods: {
    checkUser: function() {
      return _.find(  this.$store.state.onlineUsers, { id: this.friend });
    }
  },
  created() {
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

  }
}
</script>

<style>

</style>
