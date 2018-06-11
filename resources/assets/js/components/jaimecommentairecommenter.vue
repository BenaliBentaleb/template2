<template>
  <div>
    <div style="text-align:center;margin-top:10px;margin-bottom:10px;">
      <div class="row" style="margin-right:0px;margin-left:0px;">
        
        <div class="col-sm-4 col-sm-offset-2 col-xs-5" style="padding:0px;">
          <jaime :publication="publication" :id="id"></jaime>
          <!-- <commentaire :publication="publication" :id="id"></commentaire>-->
        </div>
        <div class="col-sm-4 col-xs-7" style="padding:0;">
          <div class="comment">

            <label :for="'commentinput'+ publication">

              <i class="icon-bubble" style="font-size:20px;">
              </i>
              <span class="commenter">Commenter</span>
            </label>


            <a v-if="getNumberOfComment">
              <span class="comments-number">{{getNumberOfComment }}</span>
            </a>
          </div>
        </div>
       

      </div>
    </div>
    <hr style="width:100%;margin-bottom:0;">


    <div class="comments">

      <div class="single-comment" v-for="comment in commentaires" :key="comment.id">
        <img :src="comment.user.profile.photo_profile" class="comment-pubisher-image">
        <ul class="list-unstyled">
          <li>
            <strong>{{comment.user.nom}} {{comment.user.prenom}}</strong>
          </li>
          <li>
            <span>{{moment(comment.created_at).fromNow()}} </span> 
          </li>
        </ul>
        <div>
          <p class="comment-text">
            {{comment.commentaire}} 
            <br>
          </p><span class="btn btn-blue" v-if="comment.user.id === id" @click="deleteComment(comment.id)">Supprimer</span>
          <span class="btn btn-blue" v-if="comment.user.id === id" @click="EditComment(comment.id,comment.commentaire)">Edite</span>

          <jaimecomment :comment="comment.id" :id_user="id" ></jaimecomment>

        </div>
      </div>
      <hr style="width:100%;margin-bottom:0;margin-top:0;">
    </div>

    <div class="add-comment-section" v-if= " isNewComment ">
      <img class="user-image" style="" :src="image">
      <form v-on:submit.prevent>
        <input :id="'commentinput'+publication" v-model="commentaire" @keyup.enter.prevent="commenter()" class="form-control" type="text"
          placeholder="Tapez votre commentaire .. ">
      </form>
    </div>

    <div class="add-comment-section" v-else>
      <img class="user-image" style="" :src="image">
      <form v-on:submit.prevent>
        <input :id="'commentinput'+publication" v-model="commentaire" @keyup.enter.prevent="updateComment()" class="form-control" type="text"
          placeholder="editer votre commentaire .. ">
      </form>
    </div>

  </div>

</template>

<script>
let moment = require('moment');
  import commentaire from "./commentaire.vue";
  import jaime from "./jaime.vue";
  import jaimecomment from "./jaimecomment.vue";
  export default {
    props: ["publication", "id","image"],
    components: {
      commentaire: commentaire,
      jaime: jaime,
      jaimecomment: jaimecomment
    },
    data() {
      return {
        commentaire: "",
        commentaires: [],
        likeComment: [],
        comment: [], //,
        idC: "",
        moment:moment,
        isNewComment: true,
        editedComment : '',
        idEditComment : ''
      };
    },
      notifications: {
    delete: {
      // You can have any name you want instead of 'showLoginError'
      title: "Supprimer votre commentaire",
      message: "Vous voulez supprimer votre commentaire",
      type: "success" // You also can use 'VueNotifications.types.error' instead of 'error'
    },
   
   
  },

    mounted() {
      this.getcommentaire;
      this.getJaimeCommentaire;
      
    },

    methods: {
      commenter() {
        if (this.commentaire) {
          axios.post("/commenter", {
              publication_id: this.publication,
              user_id: this.id,
              commentaire: this.commentaire
            })
            .then(response => {
              this.commentaires.push(response.data);
              this.commentaire = "";
            console.log(response.data);
            }).catch(err => {
              console.log(err)});
        }
      },

      updateComment() {
         axios.post(`/commentaire/update/${this.idEditComment}/${this.commentaire}`)
         .then(response => {
            let comment =  this.commentaires.find(value => value.id === this.idEditComment);
            comment.commentaire =  this.commentaire;
            this.isNewComment = true;
              this.commentaire = "";
             
            
         })
         
      },

      EditComment(id,comment) {
        this.isNewComment = false;
        this.idEditComment = id;
        this.editedComment = comment;
         this.commentaire = comment;
        

      },

      deleteComment(id) {
        axios.get(`/commentaire/delete/${id}`)
        .then(response => {
          console.log(response);
          this.commentaires.forEach((value, key ) => {
            if(value.id === id) {
              this.commentaires.splice(key,1);
            }
          })
        }).catch(err => console.log(err));
      }

      

      
    },
    computed: {
      getcommentaire() {
        axios.get(`/allcomment/${this.publication}`).then(response => {
         // console.log(response.data);
          response.data.forEach(value => {
            this.commentaires.push(value);
            //  if (this.likeComment.indexOf(this.id)  && response.data.id == idComment) {

            //this.likeComment.push(value);

            //  }
        //    console.log(value);
          });
        }).catch(err=> console.log(err));
      },

      getNumberOfComment() {
        return this.commentaires.length;
      }
       


    }
  };
</script>

<style scoped>
  .commenter {
    cursor: pointer;
  }
</style>