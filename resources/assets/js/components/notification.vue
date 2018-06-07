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
         // console.log(notification);
     
      //  alert("new notitfication");
        document.getElementById('noty').play();

        //send notification to admin whene reclamation is created 
        if(notification.type == "App\\Notifications\\ReclamationNotification") {
            console.log(notification);
             this.$store.commit('add_admin_not',notification);
        } else if(notification.type == "App\\Notifications\\SignalerNotification") {
                this.$store.commit('add_admin_not',notification);
        } else {
            console.log(notification);
          this.$store.commit('add_not',notification);
        }
        
      });
    }
  }
};
</script>



