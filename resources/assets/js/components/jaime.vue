<template>
  <div class="like " style="margin-right:0px;"> <!-- style="text-align:center;margin-top:10px;margin-bottom:10px;"-->

    
      
    <a class="jaime" v-if="!auth_user_likes" @click="jaime()">
      <i class="fa fa-thumbs-o-up"></i>
      <span class="jaimeText">J'aime</span>
    </a>
    <a v-else @click="unjaime()">
      <a class="jaime">
        <i class="fa fa-thumbs-up"></i>
        <span>J'aime</span>
      </a>

    </a>
    <span class="likes-number" v-if="getLikes" data-toggle="modal" :data-target="'.model-p'+ publication">
      {{getLikes}}
    </span>
   

    <div class="modal fade" v-bind:class="'model-p'+ publication" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">

      <div class="modal-dialog modal-sm" role="dialog">
        <div class="modal-content">
          <div class="modal-header modal-header-primary">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

          </div>
          <h4 class="center-block">
            <a :href="'http://127.0.0.1:8000/profile/'+p.id" v-for="p in likedBy " :key="p.id" >{{p.nom}} {{p.prenom}}
              <br>
            </a>
          </h4>
        </div>
      </div>
    </div>

  </div>


 
</template>

<script>
export default {
  props: ["publication", "id"],

  data() {
    return {
      likes: [],
      likedBy: []
    };
  },

  mounted() {
    this.listen();
    this.getAllPublication;
    // this.classActive = "model"+this.publication;
  },

  methods: {
    jaime() {
      axios.post(`/jaime/${this.publication}`).then(response => {
        console.log(response.data);
        this.likedBy.push(response.data.user);
        this.likes.push(response.data.user_id);
      });
    },
    unjaime() {
      axios.get(`/unjaime/${this.publication}`).then(response => {
        //  console.log(response);
        this.likes.forEach((val, key) => {
          if (response.data.user_id === val) {
            this.likes.splice(key, 1);
            this.likedBy.splice(key, 1);
            //  console.log(key + '   ' + val);
          }
        });
      });
    },

    listen() {
      Echo.join("like")
        .here(users => {
          // this.count = users.length;
        })
        .joining(user => {
          //   this.count++;
        })
        .leaving(user => {
          //  this.count--;
        })
        .listen("NewLike", e => {
          //   console.log('new comment');
          //   console.log(e);

          if (e.like.publication_id === this.publication) {
            this.likes.push(e.like);
            this.likedBy.push(e.like.user);
            console.log("new like");
            console.log(e.like);
          }
        });
    }
  },

  computed: {
    getLikes() {
      return this.likes.length;
    },

    getAllPublication() {
      axios.get(`/getAllPublication/${this.publication}`).then(response => {
        response.data.forEach(val => {
          // console.log(val);
          this.likedBy.push(val.user);
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

.fa-thumbs-up {
  color: #7da7d9;
}
</style>