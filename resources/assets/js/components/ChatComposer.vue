<template lang="html">
     <div class="col-sm-9 send-msg text-center" style="padding:0;">
            <form>
                <textarea class="form-control" rows="1" spellcheck="true" v-model="chat"
                 autofocus="" v-on:keyup.enter="sendChat"></textarea>
                <button class="btn btn-default send-btn" type="button" @click="sendChat">
                    <i class="fa fa-send-o"></i>
                </button>
            </form>
        </div>
</template>

<script>
    export default {
        props: [ 'userid', 'friendid'],
        data() {
            return {
                chat: ''
            }
        },
        methods: {
            sendChat: function() {
                if (this.chat != '') {
                    var data = {
                        chat: this.chat,
                        friend_id: this.friendid,
                        user_id: this.userid
                    }
                    this.chat = '';
                   // console.log('befor axios');
                    
                    axios.post('/chat/sendChat', data).then((response) => {
                        console.log(response);
                        
                        this.$parent.chats.push(data)
                    })
                }else {
                    console.log('empty')
                }
            }
        }
    }
</script>

