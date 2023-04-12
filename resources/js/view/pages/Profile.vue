<template>
    <Navbar></Navbar>
    <div class="profile">
        <div class="head">
            <div class="banner">
                <img src="/images/profile-banner.jpg" alt="" />
            </div>
            <div class="" style="border-bottom: 1px solid #4f52611c">
                <div class="user_nav container">
                    <div class="row h-100">
                        <div class="user col-3">
                            <div class="avatar">
                                <div class="avt">
                                    <img :src="UserProfile.avatar" alt="" />
                                </div>
                                <h3 class="name">{{ UserProfile.name }}</h3>
                            </div>
                        </div>
                        <div class="col-9 h-100 profile_nav">
                            <ul>
                                <router-link to="/profile">
                                    <li class="">
                                        <i class="fa-solid fa-address-card"></i>
                                        <br /><span>Profile</span>
                                    </li>
                                </router-link>
                                <router-link :to="{
                                    path: '/profile/friendships',
                                    query: { id: UserProfile.id },
                                }">
                                    <li class="AddFriend">
                                        <i class="fa-solid fa-users"></i>
                                        <br /><span>Friends</span>
                                    </li>
                                </router-link>
                                <li>
                                    <i class="fa-solid fa-shop"></i> <br /><span>Shop</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-newspaper"></i>
                                    <br /><span>Posts</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-forward-step"></i>
                                    <br /><span>Media</span>
                                </li>
                            </ul>
                            <!-- HTML !-->
                            <div class="right">
                                <div v-if="UserProfile.id != userInfor.id">
                                    <div v-if="friend_status == 0">
                                        <button class="friend" role="button" v-on:click="
                                            AddFriend(UserProfile.id)">Add
                                            Friend <i class="fa-solid fa-user-plus"></i></button><br>
                                    </div>
                                    <div v-else-if="friend_status == 1">
                                        <button class="friend" role="button">Friends <i class="fa-solid fa-users"></i>
                                        </button><br>
                                    </div>
                                    <div v-else-if="friend_status == 2">
                                        <button class="friend" role="button" v-on:click="
                                            CancelRequest(check_friend_addressee.id)
                                        ">Cancel Request <i class="fa-solid fa-user-xmark"></i></button><br>
                                    </div>
                                    <div v-else-if="friend_status == 3">
                                        <button class="friend" role="button" v-on:click="
                                            AcceptFriend(check_friend_requester.id)
                                        ">Confirm <i class="fa-solid fa-user-check"></i></button><br>
                                    </div>
                                </div>
                                <router-link :to="{
                                    path:'/beechat',
                                    query:{id:UserProfile.id}
                                }">
                                    <button class="Beechat" role="button">Beechat <img src="/images/logo.png" alt=""></button>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main container">
            <div class="row">
                <div class="sidebar col-3">
                    <ul class="totals">
                        <li><span class="quantity">100</span> <br />Friends</li>
                        <li>
                            <span class="quantity">90</span><br />
                            Post
                        </li>
                    </ul>
                    <div class="photos">
                        <h4>My Photos</h4>
                        <div class="nav">
                            <ul>
                                <li>
                                    <img src="/images/profile_avatar.jpg" alt="" />
                                </li>
                                <li>
                                    <img src="/images/profile_avatar.jpg" alt="" />
                                </li>
                                <li>
                                    <img src="/images/profile_avatar.jpg" alt="" />
                                </li>
                                <li>
                                    <img src="/images/profile_avatar.jpg" alt="" />
                                </li>
                                <li>
                                    <img src="/images/profile_avatar.jpg" alt="" />
                                </li>
                                <li>
                                    <img src="/images/profile_avatar.jpg" alt="" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content col-9">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
.stream {
    max-height: 100vh;
    overflow-y: scroll;
}

.profile .head .banner {
    width: 100%;
    height: 285px;
    overflow: hidden;
}

.profile .head .banner img {
    width: 100%;
    height: 100%;
}

.user_nav {
    width: 100%;
    height: 140px;
    gap: 65px;
}

.user_nav .user {
    position: relative;
    top: -150px;
}

.overlay {
    opacity: 0;
    transition: 0.4s;
}

.user_nav .user .avatar {
    text-align: center;
}

.user_nav .user .avatar .avt {
    width: 220px;
    height: 220px;
    /* position: absolute; */
    margin: auto;
}

.user_nav .user .avatar .avt:hover .overlay {
    opacity: 1;
}

.user_nav .user .avatar .avt .overlay {
    width: 220px;
    height: 220px;
    position: absolute;
    top: 0px;
    border-radius: 10px;
    background-color: #4f52618e;
    cursor: pointer;
}

.user_nav .user .avatar .avt i {
    color: #ffffff;
    font-size: 24px;
    position: absolute;
    top: 48%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.user_nav .user .avatar img {
    width: 220px;
    height: 220px;
    border: 2px solid white;
    border-radius: 10px;
}

.user_nav ul {
    display: flex;
    gap: 20px;
    height: 100%;
    align-items: center;
    margin-top: 10px;
}

.user_nav ul li {
    list-style: none;
    position: relative;
}

.user_nav ul li {
    text-align: center;
    font-size: 16px;
    width: 75px;
    height: 75px;
    cursor: pointer;
    color: #4f5261bb;
}

.user_nav ul .active {
    background: linear-gradient(135deg, #c395f1 0%, #8224e3 75%);
    color: #fff;
    border-radius: 10px;
    display: flex;
    margin-top: -25px;
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px,
        rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
}

.user_nav ul .active i {
    margin: auto;
    font-size: 22px;
}

.user_nav ul .active span {
    display: none;
}


.main .sidebar {
    text-align: center;
    border-right: 1px solid #4f52611c;
    padding: 40px !important;
}

.main .totals {
    /* width: 100%; */
    display: grid;
    grid-template-columns: 1fr 1fr;
    /* padding: 0px !important; */
    padding: 0px 50px 20px 50px;
    border-bottom: 1px solid #4f52611c;
}

.main .totals li {
    list-style: none;
    font-size: 1.2rem;
    color: #4f5261bb;
}

.main .totals li span {
    color: #8224e3;
    font-weight: 600;
}

.main .sidebar .photos {
    margin-top: 40px;
}

.main .sidebar .photos h4 {
    border-bottom: 4px solid #8224e3;
    padding: 10px 0px;
    margin: 0px 20%;
}

.main .sidebar .photos ul {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    padding: 0px !important;
    width: 100%;
    gap: 10px;
    margin-top: 20px;
}

.main .sidebar .photos ul li {
    list-style: none;
    border-radius: 8px;
    overflow: hidden;
}

.main .sidebar .photos ul li img {
    width: 100%;
    height: 80px;
}

/* content */
.main .content {
    /* background-color: red; */
    padding: 0px 5% !important;
}

.more-desc,
.hide-desc {
    color: #8224e3;
    font-size: 15px;
    cursor: pointer;
}

ul {
    padding: 0px;
}

li {
    list-style: none;
}

.item {
    display: flex;
    padding: 20px 0px;
    position: relative;
}

.item::before {
    content: "";
    width: 2px;
    height: 100%;
    background-color: #4f52611c;
    position: absolute;
    top: 65px;
    left: 22px;
}

.item .avt img {
    width: 45px;
    height: 45px;
    border-radius: 100%;
    z-index: 100;
}

.item .content {
    padding: 0px 20px;
}

.item .item-header .meta {
    display: flex;
    font-size: 15px;
}

.item .item-header .meta strong {
    font-weight: 600;
}

.item .item-header {
    display: flex;
    justify-content: space-between;
}

.item .item-header .meta .time {
    font-size: 13px;
    color: rgba(0, 0, 0, 0.363);
}

.item .item-content {
    margin: 15px 0px;
}

.item .item-content .description {
    font-size: 15px;
}

.item .item-content .media ul {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 15px;
    margin-top: 15px;
    width: 90%;
}

.item .item-content .media ul li {
    width: 100%;
    cursor: pointer;
}

.item .item-content .media ul li:first-child {
    grid-column-start: 1;
    grid-column-end: 4;
}

.item .item-content .media ul li img {
    width: 100%;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px,
        rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
}

.profile_nav {
    display: flex;
    justify-content: space-between;
}

.profile_nav .right {
    display: flex;
    align-items: center;
    margin: 10px 0px;
    gap: 10px;
}

/* CSS */
.friend {
    background-color: transparent;
    border: 1px solid #222222;
    border-radius: 8px;
    box-sizing: border-box;
    color: #222222;
    cursor: pointer;
    display: inline-block;
    font-family: Circular, -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif;
    font-size: 16px;
    line-height: 20px;
    margin: 0;
    outline: none;
    padding: 12px 22px;
    position: relative;
    text-align: center;
    text-decoration: none;
    touch-action: manipulation;
    transition: box-shadow .2s, -ms-transform .1s, -webkit-transform .1s, transform .1s;
    user-select: none;
    -webkit-user-select: none;
    width: auto;
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
}

.friend:focus-visible {
    box-shadow: #222222 0 0 0 2px, rgba(255, 255, 255, 0.8) 0 0 0 4px;
    transition: box-shadow .2s;
}

.friend:active {
    background-color: #F7F7F7;
    border-color: #000000;
    transform: scale(.96);
}

.friend:disabled {
    border-color: #DDDDDD;
    color: #DDDDDD;
    cursor: not-allowed;
    opacity: 1;
}

/* CSS */
.Beechat {
    appearance: button;
    background: linear-gradient(135deg, #c395f1 0%, #8224e3 75%);
    border-radius: 4px;
    box-sizing: border-box;
    color: #FFFFFF;
    cursor: pointer;
    font-family: Graphik, -apple-system, system-ui, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
    font-size: 16px;
    line-height: 1.15;
    overflow: visible;
    padding: 13px 23px;
    position: relative;
    text-align: center;
    text-transform: none;
    transition: all 80ms ease-in-out;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    width: fit-content;
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
    border: none;
}

.Beechat:disabled {
    opacity: .5;
}

.Beechat:focus {
    outline: 0;
}

.Beechat img {
    width: 20px !important;
    height: 20px !important;
    margin-left: 10px;
}
</style>
<script>
import $ from "jquery";
import Navbar from "../components/Navbar.vue";
import {
    GetUserProfile,
    AddFriend,
    AcceptFriend,
    CancelAddFriend
} from "../../services/Users";
export default {
    setup() { },
    components: {
        Navbar,
    },
    data() {
        return {
            UserProfile: "",
            check_friend_addressee: null,
            check_friend_requester: null,
            friend_status: 0 // 0: addfriend, 1:friends: 2: cancel request, 3: accept friend
        };
    },
    mounted() {
        var nav = $(".user_nav ul li");
        var url = location.pathname;

        for (let index = 0; index < nav.length; index++) {
            if (nav[index].closest("a") != null) {
                let el = nav[index].closest("a").getAttribute("href");
                if (url.search(el) != -1) {
                    nav[index].classList.add("active");
                }
            }
        }
        nav.click(function () {
            for (let index = 0; index < nav.length; index++) {
                nav[index].classList.remove("active");
            }
            $(this).addClass("active");
        });

        $(".more-desc").click(function () {
            $(this).next().show();
            $(this).hide();
            $(".hide-desc").show();
        });
        $(".hide-desc").click(function () {
            $(this).prev().hide();
            $(this).hide();
            $(this).parent().find(".more-desc").show();
        });

        $(".profile_nav ul li").click(function () {
            $(this).find(".notification").remove();
        });
    },
    created() {
        this.GetUserProfile();
    },
    methods: {
        async GetUserProfile() {
            const id = this.$route.query.id;
            this.UserProfile = await GetUserProfile(id).then(function (res) {
                const { data } = res;
                return data;
            }).catch((e) => {
                console.log(e.request.response);
            });
            if (id != this.userInfor.id) {
                if (this.UserProfile.check_friend_addressee.length > 0) {
                    this.check_friend_addressee = this.UserProfile.check_friend_addressee[0];
                    this.friend_status = this.check_friend_addressee.status
                    if (this.friend_status != 1) {
                        this.friend_status = 2                        
                    }
                }
                if (this.UserProfile.check_friend_requester.length > 0) {
                    this.check_friend_requester = this.UserProfile.check_friend_requester[0];
                    this.friend_status = this.check_friend_requester.status
                    if (this.friend_status != 1) {
                        this.friend_status = 3
                    }
                }
            }
        },
        AddFriend(id) {
            const data = {
                sendTo: id,
                sendFrom: this.userInfor.id,
            };
            AddFriend(data).then((res)=> {
                console.log(res);
                this.check_friend_addressee = res.data.check_friend_addressee
            });
            this.friend_status = 2
        },
        AcceptFriend(id) {
            AcceptFriend(id).then(function (res) {
                console.log(res);
            });
            this.friend_status = 1
        },
        CancelRequest(id) {
            CancelAddFriend(id).then((res) => {
                console.log(res);
            })
            this.friend_status = 0
        }
    },
};
</script>
