<template>
 
 <div>
   

 </div>
</template>


<script>
export default {
  data() {
    return {
      request:''
    }
  },
  mounted() {
    console.log("Component mounted. notification");
    this.listen();
  },

  props: ["id_auth"],

  methods: {
    listen() {
      Echo.private("App.User." + this.id_auth)
      .notification(notification => {
        //this.request = notification.profile// notification.nom +' '+notification.message;
        alert("new notitfication");
        document.getElementById('noty').play();
        console.log(notification);

        this.$store.commit('add_not',notification);
      });
    }
  }
};
</script>



