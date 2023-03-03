<template>
    <div class="sidebar">
        <div class="friends">
            <h5>Friends</h5>
            <div class="list">
                <ul>
                    <li
                        v-for="item in Friends"
                        :key="item"
                        v-on:click="OpenChat(item.FriendInfor.id)"
                    >
                        <img
                            class="avt"
                            :src="item.FriendInfor.avatar"
                            alt=""
                        />
                        <div class="detail">
                            <span>{{ item.FriendInfor.name }}</span>
                            <p class="status">
                                <i class="fa-solid fa-circle"></i> online
                            </p>
                        </div>
                    </li>
                    <li>
                        <img class="avt" src="" alt="" />
                        <div class="detail">
                            <span>duless</span>
                            <p class="status">an hour ago</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="hashtags">
            <h5>Hashtags</h5>
            <div class="list">
                <span
                    >#stay strong
                    <h6>100</h6></span
                >
                <span
                    >#kip moving
                    <h6>50</h6></span
                >
                <span>
                    #i am monster
                    <h6>7</h6></span
                >
            </div>
        </div>
    </div>
    <div class="chat_list">
        <Chat
            :FriendId="FriendId"
            @ChatAction="ChatAction"
            :key="FriendId"
        ></Chat>
        <div class="list">
            <div class="infor" v-for="item in ListChat" :key="item">
                <div class="avt">
                    <img
                        style="width: 55px; height: 55px; border-radius: 100%"
                        :src="item.avatar"
                        alt=""
                    />
                </div>
            </div>
        </div>
    </div>
</template>
<style>
.sidebar {
    max-height: 100vh;
    padding: 150px 0px !important;
}
.friends {
    height: 50vh;
    background: rgba(85, 97, 226, 0.02);
    width: 80%;
    padding: 30px !important;
    border-radius: 20px;
}
.friends h5,
.hashtags h5 {
    width: 50px;
    border-bottom: 3px solid #8224e3;
}
.friends .list {
    max-height: 90%;
    overflow-y: auto;
    margin-top: 10px !important;
}
.friends .list ul {
    padding: 0px;
}
.friends .list ul li {
    display: flex;
    gap: 10px;
    margin: 5px 0px !important;
    cursor: pointer;
}
.friends .list ul li span {
    font-weight: 500;
}
.friends .list ul li i {
    color: #2ed573;
    font-size: 12px;
    margin: 0px 5px !important;
}
.friends .list ul li .status {
    color: #383a4591;
}
.friends .list img {
    width: 45px;
    height: 45px;
    border-radius: 100%;
}

.hashtags {
    margin-top: 20px !important;
    width: 80%;
}
.hashtags .list {
    display: flex;
    flex-wrap: wrap;
    margin-top: 10px !important;
}
.hashtags .list span {
    font-size: 13px;
    display: flex;
    gap: 5px;
    background-color: #f8f9fb;
    padding: 5px 10px !important;
    border-radius: 20px;
    margin: 5px !important;
    cursor: pointer;
}
.chat_list {
    position: fixed;
    right: 0px;
    bottom: 0px;
    display: flex;
}
.chat_list .list {
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    margin: 10px;
}
.chat .list .avt img {
    width: 55px;
    height: 55px;
}
.infor{
    margin: 5px 0px;
}
</style>

<script>
import { ListFriend, GetUserProfile } from "../../services/Users";
import Chat from "./Chat.vue";
export default {
    components: {
        Chat,
    },
    setup() {},
    data() {
        return {
            Friends: [],
            FriendId: null,
            ListChat: [],
        };
    },
    created() {
        this.GetListFrined();
    },
    methods: {
        async GetListFrined() {
            this.Friends = await ListFriend(this.userInfor.id).then(function (
                res
            ) {
                const { data } = res;
                return data;
            });
            console.log(this.Friends);
        },
        OpenChat(id) {
            this.FriendId = id;
        },
        ChatAction(DataEvent) {
           this.ListChat.fi
        },
    },
    mounted() {},
};
</script>
