<template>
    <div>
        <button class="btn btn-success btn-block" v-if="status==0" @click="add_friend" 
        type="button" style="width:75%;margin:5px auto;">
            <i class="icon-user-follow"></i>Envoyer invitation
        </button>

         <button class="btn btn-success btn-block" v-if="status=='pending'" @click="accept_friend" 
        type="button" style="width:75%;margin:5px auto;">
            <i class="icon-user-follow"></i>accepter invitation
        </button>

        <span class="btn btn-success btn-block" v-if="status=='waiting'" 
        type="button" style="width:75%;margin:5px auto;">
            <i class="icon-user-follow"></i>en attend ..
        </span>

         <span class="btn btn-success btn-block" v-if="status=='friend'" 
        type="button" style="width:75%;margin:5px auto;">
            <i class="icon-user-follow"></i>Amies
        </span>


    </div>
</template>

<script>
export default {
  props: ["profile_user_id"],
  data() {
    return {
      status: ""
    };
  },
  mounted() {
    axios
      .get(`/check/${this.profile_user_id}`)
      .then(response => {
        console.log(response);
        this.status = response.data.status;
      })
      .catch(err => {
        console.log(err);
      });
  },

  methods: {
    add_friend: function() {
      
      
        axios.get("/add_friend/" + this.profile_user_id)
        .then(response => {
          if (response.data == 1) {
            console.log(response.data);
            this.status = "waiting";
           
          }
        });
    },

    accept_friend: function() {
     
    
        axios.get("/accept_friend/" + this.profile_user_id)
        .then(response => {
          if (response.data  == 1) {
            console.log(response.data);
            this.status = "friend";
          
          }
        });
    }
  }
};
</script>

<style>

</style>