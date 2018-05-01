<template>
    <div>
        <div style="text-align:center;margin-top:10px;margin-bottom:10px;">

            <jaime :publication="publication" :id="id"></jaime>
           <!-- <commentaire :publication="publication" :id="id"></commentaire>-->
           
          <span class="comment" style="text-align:center;margin-top:10px;margin-bottom:10px;" >
       
                   <label :for="'commentinput'+ publication" >
                       
                    <i class="icon-bubble"></i>
                    <span class="commenter">Commenter</span>
                   </label>
               
               
                <a v-if="getNumberOfComment">
                    <span class="comments-number">{{getNumberOfComment }}</span>
                </a>
            </span>
            <hr style="width:100%;margin-bottom:0;">

        </div>


        <div class="comments">
          
            <div class="single-comment" v-for="comment in commentaires" :key="comment.id">
                <img src="assets/img/customer.png" class="comment-pubisher-image">
                <ul class="list-unstyled">
                    <li>
                        <strong>{{comment.user.nom}} {{comment.user.prenom}}</strong>
                    </li>
                    <li>
                        <span>{{comment.created_at}} </span>
                    </li>
                </ul>
                <div>
                    <p class="comment-text">
                        {{comment.commentaire}}
                        <br>
                    </p>

                  <jaimecomment :comment="comment.id" :id="id"></jaimecomment>

                </div>
            </div>
            <hr style="width:100%;margin-bottom:0;margin-top:0;">
        </div>
        <div class="add-comment-section" >
            <img class="user-image" style="background-image:url(&quot;assets/img/customer.png&quot;);">
            <form v-on:submit.prevent>
                <input :id="'commentinput'+publication" v-model="commentaire" @keyup.enter.prevent="commenter()" class="form-control" type="text" placeholder="Tapez votre commentaire .. ">
            </form>
        </div>
    </div>

</template>

<script>
import commentaire from "./commentaire.vue";
import jaime from "./jaime.vue";
import jaimecomment from "./jaimecomment.vue"
export default {
  props: ["publication", "id"],
  components: {
    commentaire: commentaire,
    jaime: jaime,
    jaimecomment:jaimecomment
  },
  data() {
    return {
      commentaire: "",
      commentaires: [],
      likeComment: [],
      comment: [], //,
      idC: ""
    };
  },

  mounted() {
    this.getcommentaire;
    this.getJaimeCommentaire;
  },

  methods: {
    commenter() {
      if (this.commentaire) {
        axios
          .post("/commenter", {
            publication_id: this.publication,
            user_id: this.id,
            commentaire: this.commentaire
          })
          .then(response => {
            this.commentaires.push(response.data);
            this.commentaire = "";
            //console.log(response.data);
          });
      }
    },

   /* jaimeCommentaire(idComment) {
      axios.post(`/jaimeCommentaire/${idComment}`).then(response => {
        console.log(response);
       // this.idC = idComment;
       // this.likeComment.push(response.data);
        this.likeComment.push(response.data.user_id);
        //  this.authUserLikeComment;
      });
    },
    unjaimeCommentaire(idComment) {
      /*  axios.get(`/unjaimeCommentaire/${idComment}`).then(response => {
        console.log(response);
    
      });*/
  
  },
  computed: {
    getcommentaire() {
      axios.get(`/allcomment/${this.publication}`).then(response => {
        console.log(response.data);
        response.data.forEach(value => {
          this.commentaires.push(value);
          //  if (this.likeComment.indexOf(this.id)  && response.data.id == idComment) {

          //this.likeComment.push(value);

          //  }
          console.log(value);
        });
      });
    },

   

    getNumberOfComment() {
      return this.commentaires.length;
    },

    
/*
    authUserLikeComment() {
  //     this.comment.forEach(element => {
      //    if(element.id != this.idC) {
      let user = this.likeComment.indexOf(this.id)//find(value =>(value.id === this.idC) && (value.user_id === this.id));
      if (user ) {
        return true;
      }
      return false;

      //   }
       //});
    }*/
  }
};
</script>

<style scoped>
.commenter {
  cursor: pointer;
}
</style>