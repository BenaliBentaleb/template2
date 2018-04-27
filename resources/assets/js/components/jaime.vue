<template>
    <div class="like">
        <a class="jaime"  v-if="!auth_user_likes" @click="jaime()" >
            <i class="fa fa-thumbs-o-up"></i>
            <span>J'aime</span>
        </a>
        <a v-else @click="unjaime()" >
           <a class="jaime" >
            <i class="fa fa-thumbs-up"></i>
            <span>J'aime</span>
            </a>
            <span class="likes-number">20 </span>
        </a>
    </div>
</template>

<script>
export default {
  props: ["publication", "id"],

  data() {
    return {
      likes: []
    };
  },

  mounted() {
    this.getAllPublication;
  },

  methods: {
    jaime() {
      axios.post(`/jaime/${this.publication}`).then(response => {
        console.log(response);
       this.likes.push(response.data.user_id)
      });
    },
     unjaime() {
      axios.get(`/unjaime/${this.publication}`).then(response => {
        console.log(response);
       this.likes.forEach((val,key)=> {
           if(response.data.user_id === val) {
             this.likes.splice(key,1);  
           }
           });
      
      });
    
     }
     
  },

  computed: {

     
    
    getAllPublication() {
      axios.get(`/getAllPublication/${this.publication}`).then(response => {
        response.data.forEach(val => {
          console.log(val);
          this.likes.push(val.user_id);
        });
      });
    },
    auth_user_likes() {
      let check_index = this.likes.indexOf(this.id);
      if (check_index === -1) {
        return false;
      } else {
        return true;
      }
    }
  }
};
</script>

<style scoped>
.jaime {
  cursor: pointer;
}
.fa-thumbs-up{
    color:#7da7d9 
}
</style>