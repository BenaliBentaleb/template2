<template>
    <div :id="'user-'+friendid" class="tab-pane fade in " role="tabpanel">
          <audio id="ChatAudio" >
            <source :src="'/sounds/chat.mp3'">
        </audio>
        <div class="col-md-9 text-center user-info-header">
            <span class="avatar avatar-xxl" v-bind:style="styleObject">
                 <onlineuser :friend ="friendid"></onlineuser>
            </span>
            <span class="user-name" style="line-height:50px;font-weight:bold;">{{ friend.nom +' '+friend.prenom}}</span>
        </div>
        <div class="messages" >
                <div v-for="chat in chats" :key="chat.id">

            <div class="msg-sent" v-if="chat.user_id ==friendid ">
                <span class="avatar avatar-xl" v-bind:style="styleObject">
                 <onlineuser :friend ="friendid"></onlineuser>

                </span>
                <span class="msg-time">{{chat.created_at}}</span>
                <p> {{chat.chat}}
                    <br>
                </p>
            </div>
                 <div class="clearfix"></div>

           
            <div class="msg-recieved" v-if="chat.user_id == userid">
                <span class="msg-time">{{chat.created_at}}</span>
                <div class="clearfix"></div>
                <p>{{chat.chat}}
                    <br>
                </p>
            </div>
        </div>
    </div>
      <chat-composer v-bind:userid="userid"
                    
                     v-bind:friendid="friendid">

      </chat-composer>
    </div>
</template>

<script>
import chatcomposer from "./ChatComposer.vue";
export default {
  props: ["userid", "friendid", "friend"],
  components: {
    "chat-composer": chatcomposer
  },

  data() {
    return {
      chats: "",
      onlineUsers: "",
       styleObject: {
        backgroundImage:'url('+this.friend.profile.photo_profile+')'
      
  }
    };
  },
  mounted() {
    
    axios
      .post("/chat/getChat/" + this.friendid)
      .then(response => {
        console.log(response);
        //  this.$store.getters.getchats = response.data;
        this.chats = response.data;
        // this.$store.getters.all_nots;
      })
      .catch(err => console.log(err));

    Echo.private("Chat." + this.friendid + "." + this.userid).listen(
      "BroadcastChat",
      e => {
       // document.getElementById("ChatAudio").play();
        this.chats.push(e.chat);
        alert(this.friendid +'send a message')
      }
    );
  }
};
</script>

<style>

</style>