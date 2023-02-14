<template>
    <TabContents :dataTab="TabContents"></TabContents>
    <div class="Friend_ship container">
        <router-view></router-view>
        <!-- <div id="Friend_List" v-for="item in Friends" :key="item">
            <router-link
                v-if="item.status == 1"
                :to="{
                    path: '/profile',
                    query: { id: item.RequesterInfor.id },
                }"
            >
                <div class="infor">
                    <div class="avt">
                        <img :src="item.RequesterInfor.avatar" alt="" />
                    </div>
                    <div class="meta">
                        <div class="post-by">
                            <span>
                                <strong>{{
                                    item.RequesterInfor.name
                                }}</strong></span
                            >
                            <br />
                            <span class="time">4 weeks ago</span>
                        </div>
                    </div>
                </div>
            </router-link>
        </div> -->
    </div>
</template>
<style scoped>
.tab {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
}
.Friend_ship {
    top: 80px;
    /* background-color: red; */
    left: 0px;
    width: 100%;
    height: 70vh;
    transition: all 0.5s 0.1s;
    /* border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px; */
    /* padding: 4%; */
    /* display: none; */
    margin-bottom: 30px;
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
.Friend_ship {
    overflow-y: scroll;
    max-height: 100%;
}
.Friend_ship .infor {
    display: flex;
    gap: 10px;
    margin: 5px 0px;
    cursor: pointer;
    margin: 10px 0px;
}
.Friend_ship .avt img {
    width: 42px;
    height: 42px;
    border-radius: 100%;
    z-index: 100;
}
</style>
<script>
import { ListFriend } from "../../services/Users";
import Forms from "./Forms.vue";
import TabContents from "./TabContents.vue";
import Card from "./Card.vue";
export default {
    setup() {},
    components: {
        Forms,
        TabContents,
        Card,
    },
    data() {
        return {
            TabContents: [
                {
                    name: "Friend List",
                    path: "friend_list",
                },
                {
                    name: "New Friend",
                    path: "new_friend",
                },
            ],
            Friends: [],
        };
    },
    created() {
        this.GetFriendList();
    },
    methods: {
        async GetFriendList() {
            const id = this.userInfor.id;
            this.Friends = await ListFriend(id)
                .then(function (res) {
                    const { data } = res;
                    return data;
                })
                .catch(function (err) {
                    console.log(err);
                });
        },
    },
};
</script>
