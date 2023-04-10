<template>
    <div class="content">
        <div class="contact-profile">
            <img :src="ChatUser.avatar" alt="" />
            <p>{{ ChatUser.name }}</p>
            <div class="beechat-action">
                <i class="fa-solid fa-video"></i>
                <i class="fa fa-twitter" aria-hidden="true"></i>
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </div>
        </div>
        <div class="messages" id="messages">
            <ul>
                <div v-for="(item, index) in ChatContent" :key="index" class="">
                    <li v-if="item.UserId == ToUser" class="sent">
                        <img :src="item.user.avatar" alt="" />
                        <p>{{ item.message }}</p>
                    </li>
                    <li v-else class="replies">
                        <img :src="item.user.avatar" alt="" />
                        <p>{{ item.message }}</p>
                    </li>
                </div>
                <div class="">
                </div>
            </ul>
        </div>
        <div class="message-input">
            <form class="wrap" @submit.prevent="Send">
                <input type="text" autocomplete="off" name="message" placeholder="Write your message..." />
                <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
</template>
<style scoped>
ul {
    padding: 0px !important;
    margin: 0px !important;
}

#frame .content {
    float: right;
    width: 60%;
    height: 100%;
    overflow: hidden;
    position: relative;
}

@media screen and (max-width: 735px) {
    #frame .content {
        width: calc(100% - 58px);
        min-width: 300px !important;
    }
}

@media screen and (min-width: 900px) {
    #frame .content {
        width: calc(100% - 340px);
    }
}

#frame .content .contact-profile {
    width: 100%;
    height: 60px;
    line-height: 60px;
    background: #f5f5f5;
    z-index: 100;
}

#frame .content .contact-profile img {
    width: 40px;
    border-radius: 50%;
    float: left;
    margin: 9px 12px 0 9px;
}

#frame .content .contact-profile p {
    float: left;
}

#frame .content .contact-profile .beechat-action {
    float: right;
}

#frame .content .contact-profile .beechat-action i {
    margin-left: 14px;
    cursor: pointer;
}

#frame .content .contact-profile .beechat-action i:nth-last-child(1) {
    margin-right: 20px;
}

#frame .content .contact-profile .beechat-action i:hover {
    color: #435f7a;
}

#frame .content .messages {
    /* overflow-y: scroll; */
    overflow-x: hidden;
    width: 100%;
    max-height: calc(100% - 110px);
    position: relative;
    top: -15px;
    z-index: 50;
    padding: 0px 10px;
}

@media screen and (max-width: 735px) {
    #frame .content .messages {
        max-height: calc(100% - 125px);
    }
}

#frame .content .messages::-webkit-scrollbar {
    width: 0px;
    background: rgba(0, 0, 0, 0);
}

#frame .content .messages::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, 0.3);
}

#frame .content .messages ul {
    padding: 0px 10px;
}

#frame .content .messages ul li {
    display: inline-block;
    clear: both;
    float: left;
    width: calc(100%);
    font-size: 0.9em;
    padding: 5px;
}


#frame .content .messages ul li.sent img {
    margin: 6px 8px 0 0;
    width: 40px;
    height: 40px;
}

#frame .content .messages ul li.sent p {
    background: #435f7a;
    color: #f5f5f5;
    margin-top: 5px;
}

#frame .content .messages ul li.replies img {
    float: right;
    margin: 6px 0 0 8px;
    width: 40px;
    height: 40px;
}

#frame .content .messages ul li.replies p {
    background: #f5f5f5;
    float: right;
    margin-top: 5px;

}

#frame .content .messages ul li img {
    width: 22px;
    border-radius: 50%;
    float: left;
}

#frame .content .messages ul li p {
    display: inline-block;
    padding: 10px 15px;
    border-radius: 20px;
    max-width: 205px;
    line-height: 130%;
}

@media screen and (min-width: 735px) {
    #frame .content .messages ul li p {
        max-width: 300px;
    }
}

#frame .content .message-input {
    position: absolute;
    bottom: 0;
    width: 100%;
    z-index: 99;
    background-color: white;
}

#frame .content .message-input .wrap {
    position: relative;
}

#frame .content .message-input .wrap input {
    font-family: "proxima-nova", "Source Sans Pro", sans-serif;
    float: left;
    border: none;
    width: calc(100% - 90px);
    padding: 11px 32px 10px 8px;
    font-size: 0.8em;
    color: #32465a;
}

@media screen and (max-width: 735px) {
    #frame .content .message-input .wrap input {
        padding: 15px 32px 16px 8px;
    }
}

#frame .content .message-input .wrap input:focus {
    outline: none;
}

#frame .content .message-input .wrap .attachment {
    position: absolute;
    right: 60px;
    z-index: 4;
    margin-top: 10px;
    font-size: 1.1em;
    color: #435f7a;
    opacity: 0.5;
    cursor: pointer;
}

@media screen and (max-width: 735px) {
    #frame .content .message-input .wrap .attachment {
        margin-top: 17px;
        right: 65px;
    }
}

#frame .content .message-input .wrap .attachment:hover {
    opacity: 1;
}

#frame .content .message-input .wrap button {
    float: right;
    border: none;
    width: 50px;
    padding: 12px 0;
    cursor: pointer;
    background: #32465a;
    color: #f5f5f5;
}

@media screen and (max-width: 735px) {
    #frame .content .message-input .wrap button {
        padding: 16px 0;
    }
}

#frame .content .message-input .wrap button:hover {
    background: #435f7a;
}

#frame .content .message-input .wrap button:focus {
    outline: none;
}
</style>

<script>
import $ from 'jquery'
import { SendMessage } from '../../../services/Chat';
import { GetChatDetail } from '../../../services/Chat';
export default {
    data() {
        return {
            RoomId: null,
            ToUser: this.$route.query.id,
            ChatContent: null,
            User: null
        }
    },
    components: {

    },
    props: {
        ChatUser: Object,
    },
    created() {
    },
    watch: {
        ChatUser: function (newVal, oldVal) {
            console.log(newVal);
        },
        ChatContent: function (newVal, oldVal) {
            setTimeout(function () {
                const myDiv = document.getElementById('messages');
                myDiv.scrollTop = myDiv.scrollHeight - myDiv.clientHeight;
            }, 100)
        }
    },
    methods: {
        Send(e) {
            var message = e.target.message.value;
            var data = {
                UserId: this.userInfor.id,
                ToUser: parseInt(this.ToUser),
                RoomId: this.RoomId,
                message: message,
                Time: new Date().toLocaleString().replace(",", "").replace(/:.. /, " "),
                type: 0,
            };
            SendMessage(data).then((res) => {
                console.log(res);
                this.ChatContent.push(res.data)
                setTimeout(function () {
                    const myDiv = document.getElementById('messages');
                    myDiv.scrollTop = myDiv.scrollHeight - myDiv.clientHeight;
                }, 100)

            }).catch((e) => {
                console.log(e.request.response);
            })
        }
    },
    mounted() {
        GetChatDetail(this.ToUser).then((res) => {
            this.ChatContent = res.data.message
            if (this.ChatContent) {
                this.RoomId = this.ChatContent[0].RoomId
            }
        }).catch((e) => {
            console.log(e.request.response);
        })

        let channel = Echo.channel('channelchat' + this.userInfor.id);
        channel.listen('ChatEvent',(res)=> {
            console.log(res.data);
            this.ChatContent.push(res.data)
            setTimeout(function () {
                const myDiv = document.getElementById('messages');
                myDiv.scrollTop = myDiv.scrollHeight - myDiv.clientHeight;
            }, 100)
        })
    }
};
</script>
