
<template>
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages" :key="message.id">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                     <span class="avatar mr-3 align-self-center"  v-bind:style="{backgroundImage: 'url('+ message.user.profile.photo_profile +')'}"></span>
            
                        <a :href="'http://127.0.0.1:8000/profile/'+message.user.id">{{ message.user.nom }} {{message.user.prenom}}</a>
                    </strong>
                </div>
                <p>
                    {{ message.message }} <h6>{{moment(message.created_at).fromNow()}}</h6>
                </p>
            </div>
        </li>
    </ul>
</template>

<script>
let moment = require("moment");
  export default {
    props: ['messages'],
    data() {
        return {
             moment: moment,
        }
    }
  };
</script>