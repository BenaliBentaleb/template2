<template>
    <li>
        <a  class="suivie"  v-if="!isFollowed"   @click="suivie()">
            <i class="icon-eyeglass"></i>
            <span>&nbsp; Suivre</span>
        </a>

         <a  class="suivie" v-else  @click="unsuivie()">
            <i class="icon-eyeglass"></i>
            <span>&nbsp; Unsuivre</span>
        </a>
    </li>
</template>

<script>
export default {
props:['publication','user'],
    data() {
        return {
            isFollowed:''
        }
    },
    mounted() {
        this.checkIfUserHasFollowed();
    },

      notifications: {
    suivieStatus: {
      // You can have any name you want instead of 'showLoginError'
      title: "Votre operation est bien effectueé!",
      message: "Maintenat vous avez suivier cette publication",
      type: "success" // You also can use 'VueNotifications.types.error' instead of 'error'
    },
    unsuivieStatus: {
      // You can have any name you want instead of 'showLoginError'
      title: "Votre operation est bien effectueé!",
      message: "Maintenat vous avez unsuivier cette publication",
      type: "success" // You also can use 'VueNotifications.types.error' instead of 'error'
    },
   
  },

    methods: {
        suivie() {
            axios.post(`/suivie/publication/${this.publication}`).then(response => {
               // console.log(response);
                this.isFollowed = true;
                this.suivieStatus();
            }).catch(err => {
                console.log(err);
                
            });
        },

        unsuivie() {
              axios.post(`/unsuivie/publication/${this.publication}`).then(response => {
            //    console.log(response);
                this.isFollowed = false;
                  this.unsuivieStatus();
            }).catch(err => {
                console.log(err);
                
            });
        },

        checkIfUserHasFollowed() {
             axios.get(`/check/user/suivie/publication/${this.user}/${this.publication}`).then(response => {
             //   console.log(response)
                this.isFollowed = response.data ? true : false;
            }).catch(err => {
                console.log(err);
                
            });
        }
    }


};
</script>

<style scoped>
.suivie {
    cursor: pointer;
}
</style>
