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

}
</script>

<style>

</style>
