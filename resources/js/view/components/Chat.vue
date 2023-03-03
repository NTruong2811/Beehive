<template>
    <div class="chat" v-show="FriendId != null">
        <div class="windown">
            <div class="chat_head">
                <div class="infor">
                    <div class="avt">
                        <img :src="FriendInfor.avatar" alt="" />
                    </div>
                    <div class="meta">
                        <div class="post-by">
                            <span>
                                <strong>{{ FriendInfor.name }}</strong></span
                            >
                            <br />
                            <span class="time">4 weeks ago</span>
                        </div>
                    </div>
                </div>
                <div class="action">
                    <ul>
                        <li>
                            <i class="fa-solid fa-phone"></i>
                        </li>
                        <li>
                            <i
                                class="fa-solid fa-video"
                                v-on:click="VideoCall"
                            ></i>
                        </li>
                        <li class="down">
                            <i class="fa-solid fa-angle-down"></i>
                        </li>
                        <li class="close">
                            <i class="fa-solid fa-xmark"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="chat_content" id="chat_content">
                <div class="line_chat" v-for="item in ChatDetail" :key="item">
                    <div
                        class="receiver"
                        v-if="item.UserId != this.userInfor.id"
                    >
                        <div class="avt">
                            <img :src="FriendInfor.avatar" alt="" />
                        </div>
                        <div class="content">
                            <span>{{ item.message }}</span>
                        </div>
                    </div>
                    <div class="sender" v-if="item.UserId == this.userInfor.id">
                        <div class="content">
                            <span>{{ item.message }}</span>
                        </div>
                        <div class="avt">
                            <img :src="this.userInfor.avatar" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="action_sender">
                <form action="" method="post" v-on:submit.prevent="SendMessage">
                    <input
                        autocomplete="off"
                        type="text"
                        name="message"
                    /><button>
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>
<style scoped>
.chat {
    display: flex;
}
.tabcontent ul {
    padding: 0px !important;
    margin: 0px !important;
}
.chat_head {
    padding: 3%;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;
    display: flex;
    justify-content: space-between;
}
.chat_head .action ul {
    display: flex;
    gap: 10px;
}
.chat_head .action ul li {
    list-style: none;
    font-size: 18px;
    cursor: pointer;
}
.chat_content {
    padding: 3%;
    max-height: 76%;
    overflow-y: auto;
}
.chat_content .line_chat {
    display: flex;
    gap: 10px;
    margin: 10px 0px;
}
.chat_content .line_chat .content {
    background-color: #fbfafc;
    padding: 8px 15px 0px 15px;
    border-radius: 20px;
    height: auto;
    width: 69%;
}
.chat_content .line_chat .content span {
    /* line-height: 30px; */
    word-wrap: break-word;
}
.receiver {
    display: flex;
    /* justify-content: flex-end; */
    width: 100%;
    gap: 10px;
}
.sender {
    display: flex;
    justify-content: flex-end;
    width: 100%;
    gap: 10px;
}
.sender .content {
    background: linear-gradient(135deg, #c395f1 0%, #8224e3 75%);
    color: white;
}
.windown {
    width: 355px;
    height: 485px;
    /* position: fixed; */
    /* background-color: red; */
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px,
        rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;
    background-color: white;
    position: relative;
    /* padding: 3%; */
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    overflow: hidden;
}
.avt img {
    width: 42px;
    height: 42px;
    border-radius: 100%;
    z-index: 100;
}
.chat .list {
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    margin: 10px;
}
.chat .list .avt img {
    width: 55px;
    height: 55px;
}

.action_sender {
    position: absolute;
    bottom: 0px;
    height: 40px;
    /* background-color: red; */
    width: 100%;
    padding: 0px 3%;
}

.action_sender input {
    width: 100%;
    background-color: #fbfafc;
    border: 0px;
    outline: none;
    font-size: 16px;
    padding: 5px 10px;
    border-radius: 20px;
}
.action_sender form {
    display: flex;
    flex-wrap: nowrap;
}
.action_sender form button {
    background-color: transparent;
    border: 0px;
    outline: none;
}
.meta {
    display: flex;
    font-size: 15px;
}
.meta strong {
    font-weight: 600;
}
.meta .time {
    font-size: 13px;
    color: rgba(0, 0, 0, 0.363);
}
.infor {
    display: flex;
    gap: 10px;
    margin: 5px 0px;
    cursor: pointer;
}
</style>
<script>
import $ from "jquery";
import { GetUserProfile } from "../../services/Users";
import { Calling } from "../../services/ActionServices/BeehiveCall";
import { GetChatDetail, SendMessage } from "../../services/Chat";
import "../../services/ActionServices/BeehiveCall";
export default {
    props: {
        FriendId: Number,
    },
    setup() {},
    data() {
        return {
            FriendInfor: "",
            ChatDetail: [],
            RoomId: "",
        };
    },
    created() {
        this.GetFriend();
    },
    methods: {
        SendMessage(e) {
            var message = e.target.message.value;
            var data = {
                UserId: this.userInfor.id,
                ToUser: this.FriendId,
                RoomId: this.RoomId,
                message: message,
                type: 0,
            };
            this.ChatDetail.push(data);
            SendMessage(data)
                .then(function (res) {
                    $(".chat_content").scrollTop(
                        $(".chat_content").height() + 500
                    );
                })
                .catch(function (res) {
                    console.log(res.request.response);
                });
        },
        async GetFriend() {
            this.FriendInfor = await GetUserProfile(this.FriendId).then(
                function (res) {
                    const { data } = res;
                    return data;
                }
            );
        },
        VideoCall() {
            const id = this.userInfor.id;
            Calling(id, this.FriendId);
        },
    },
    async mounted() {
        if (this.FriendId != null) {
            this.ChatDetail = await GetChatDetail(this.FriendId).then(function (
                res
            ) {
                const { data } = res;
                return data;
            });
            this.RoomId = this.ChatDetail[0].RoomId;
            $(document).ready(function () {
                $(".chat_content").scrollTop($(".chat_content").height() + 500);
            });
        }

        const user = JSON.parse(localStorage.getItem("user"));
        var VueThis = this;
        window.Echo.channel("channelchat" + user.id).listen(
            "ChatEvent",
            function (res) {
                VueThis.ChatDetail.push(res);
                $(document).ready(function () {
                    $(".chat_content").scrollTop(
                        $(".chat_content").height() + 500
                    );
                });
            }
        );

        $(".chat .close").click(function () {
            $(".windown").hide()
        });

        // $(".chat .list .infor").click(function () {
        //     $(this).hide();
        //     $(".windown").show();
        // });
    },
};
</script>
