<template>
    <div>
        <a style="font-size:17px;cursor:pointer" v-if="!authUserLikeComment" @click="jaimeCommentaire()">
            <i class="fa fa-thumbs-o-up" style="font-size:20px;"></i>
        </a>
        <a style="font-size:17px;cursor:pointer" v-else @click="unjaimeCommentaire()">
            <i class="fa  fa-thumbs-up" style="font-size:20px;"></i>
        </a>
        <span class="comment-like-number" v-if="getLikes" data-toggle="modal" :data-target="'.model-c'+ comment">{{getLikes}}</span>
      
        <div class="modal fade" v-bind:class="'model-c'+ comment" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">

            <div class="modal-dialog modal-sm" role="dialog">
        <div class="modal-content">
          <div class="modal-header modal-header-primary">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

          </div>
          <h4 class="text-center">
            <a  class="nomPrenom"   :href="'http://127.0.0.1:8000/profile/'+p.id" v-for="p in likedBy " :key="p.id" >{{p.nom}} {{p.prenom}}
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
        props: ['comment', 'id_user'],

        data() {
            return {
                likeComment: [],
                 likedBy: [],
            }
        },
        mounted() {
            this.getJaimeCommentaire;
        },
        methods: {
            jaimeCommentaire() {
                axios.post(`/jaimeCommentaire/${this.comment}`).then(response => {
                    //console.log(response);
                    // this.idC = idComment;
                    // this.likeComment.push(response.data);
                    this.likeComment.push(response.data.user_id);
                     this.likedBy.push(response.data.user);
                    //  this.authUserLikeComment;
                });
            },
            unjaimeCommentaire() {
                axios.get(`/unjaimeCommentaire/${this.comment}`).then(response => {
                    this.likeComment.forEach((val, key) => {
                        if (val === this.id_user) {
                            this.likeComment.splice(key, 1);
                         //    this.likedBy.push(response.data.user);
                              this.likedBy.splice(key, 1);
                        }

                    })
                   // console.log(response);

                });
            }
        },
        computed: {

            getLikes() {
                return this.likeComment.length;
            },

            // update ui 
            getJaimeCommentaire() {
                axios.get(`/allJaimeCommenataire/${this.comment}`).then(response => {
                   // console.log(response);
                    response.data.forEach(val => {
                        this.likeComment.push(val.user_id);
                          this.likedBy.push(val.user);
                    });
                });
            },
            // check if the authtentificated user is liked this comment
            authUserLikeComment() {

                let user = this.likeComment.indexOf(this.id_user) 
                if (user === -1) {
                    return false;
                } else {
                    return true;
                }



            }
        }
    };
</script>

<style scoped>
.nomPrenom {
    color: black;
    margin-bottom: 10px;
}
.nomPrenom:hover {
    color: cornflowerblue;
}
</style>