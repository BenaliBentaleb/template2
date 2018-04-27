<template>
  <div class="like">
    

    <a class="jaime" v-if="!auth_user_likes" @click="jaime()">
      <i class="fa fa-thumbs-o-up"></i>
      <span>J'aime</span>
    </a>
    <a v-else @click="unjaime()">
      <a class="jaime">
        <i class="fa fa-thumbs-up"></i>
        <span>J'aime</span>
      </a>

    </a>
    <span class="likes-number" v-if="getLikes" data-toggle="modal" :data-target="'.model'+ publication">
      {{getLikes}} 
    </span>

    <div class="modal fade" v-bind:class="'model'+ publication"  
    tabindex="-1" role="dialog"
     aria-labelledby="mySmallModalLabel">

        <div class="modal-dialog modal-sm" role="dialog"
        >
          <div class="modal-content">
              <div class="modal-header modal-header-primary">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 
              </div>
              <h4 class="center-block"><a  :href="'profile/'+p.id" v-for="p in likedBy ">{{p.nom}} {{p.prenom}} <br></a></h4>
          </div>
        </div>
      </div>
    
        <!--<div v-for="p in likedBy ">{{p}}</div>-->
      </div>
    

  </div>
</template>

<script>
  export default {
    props: ["publication", "id"],

    data() {
      return {
        likes: [],
        likedBy: [],
        classActive:"model"+this.publication,
        userId:'',
      };
    },

    mounted() {
      this.getAllPublication;
     // this.classActive = "model"+this.publication;
    },

    methods: {
      jaime() {
        axios.post(`/jaime/${this.publication}`).then(response => {
          console.log(response);
          this.likedBy.push(response.data.user);
          this.likes.push(response.data.user_id);
        });
      },
      unjaime() {
        axios.get(`/unjaime/${this.publication}`).then(response => {
          console.log(response);
          this.likes.forEach((val, key) => {
            if (response.data.user_id === val) {
              this.likes.splice(key, 1);
              this.likedBy.splice(key, 1);
              console.log(key+'   '+val);
              
            }
          });
        });
      },
      getIdUser(id) {
        return id ;
      }
    },

    computed: {
      getLikes() {
        return this.likes.length;
      },

      getAllPublication() {
        axios.get(`/getAllPublication/${this.publication}`).then(response => {
          response.data.forEach(val => {
            console.log(val);
            this.likedBy.push(val.user);
            this.likes.push(val.user_id);
            this.userId = val.user_id;
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

  .fa-thumbs-up {
    color: #7da7d9;
  }
</style>