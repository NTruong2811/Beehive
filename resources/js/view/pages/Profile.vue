<template>
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
                                <div class="avt add_friend">
                                    <img :src="UserProfile.avatar" alt="" />
                                    <div
                                        class="overlay"
                                        v-on:click="AddFriend(UserProfile.id)"
                                        v-show="
                                            UserProfile.id != this.userInfor.id
                                        "
                                    >
                                        <i class="fa-solid fa-user-plus"></i>
                                    </div>
                                </div>
                                <h3 class="name">{{ UserProfile.name }}</h3>
                            </div>
                        </div>
                        <div class="col-9 h-100">
                            <ul>
                                <router-link
                                    :to="{
                                        path: '/profile',
                                        query: { id: UserProfile.id },
                                    }"
                                >
                                    <li class="">
                                        <i class="fa-solid fa-signs-post"></i>
                                        <br />
                                        <span>Activity</span>
                                    </li>
                                </router-link>
                                <li class="">
                                    <i class="fa-solid fa-address-card"></i>
                                    <br /><span>Profile</span>
                                </li>
                                <router-link
                                    :to="{
                                        path: '/friendship',
                                        query: { id: UserProfile.id },
                                    }"
                                >
                                    <li>
                                        <i class="fa-solid fa-users"></i>
                                        <br /><span>Friends</span>
                                    </li>
                                </router-link>
                                <li>
                                    <i class="fa-solid fa-shop"></i> <br /><span
                                        >Shop</span
                                    >
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
                                    <img
                                        src="/images/profile_avatar.jpg"
                                        alt=""
                                    />
                                </li>
                                <li>
                                    <img
                                        src="/images/profile_avatar.jpg"
                                        alt=""
                                    />
                                </li>
                                <li>
                                    <img
                                        src="/images/profile_avatar.jpg"
                                        alt=""
                                    />
                                </li>
                                <li>
                                    <img
                                        src="/images/profile_avatar.jpg"
                                        alt=""
                                    />
                                </li>
                                <li>
                                    <img
                                        src="/images/profile_avatar.jpg"
                                        alt=""
                                    />
                                </li>
                                <li>
                                    <img
                                        src="/images/profile_avatar.jpg"
                                        alt=""
                                    />
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
.main {
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
.item .item-content .action ul {
    margin: 15px 0px;
    display: flex;
    gap: 20px;
    border: 1px solid #4f52611c;
    border-left: 0px;
    border-right: 0px;
    padding: 15px 0px;
}
.item .item-content .action ul li {
    display: flex;
    gap: 8px;
    color: #4f5261d7;
}
.item .item-content .action ul li .quantity {
    background-color: #4f52611c;
    padding: 0px 5px;
    border-radius: 100%;
}
.item .item-content .action ul li i {
    margin-top: 2px;
}
.item-cmt {
    display: flex;
    font-size: 15px;
    width: 100%;
}
.item-cmt strong {
    font-weight: 600;
}
.item-cmt-content {
    margin: 0px 10px;
    width: 100%;
}
.item-cmt-header {
    margin-top: 10px;
}
.item-cmt-header .time {
    margin-left: 5px;
    font-size: 13px;
    color: rgba(0, 0, 0, 0.363);
}
.item-cmt .comment .text {
    width: 100%;
    background-color: #9e9e9e23;
    padding: 15px;
    border-radius: 20px;
    margin-top: 10px;
}
.item-cmt .comment ul {
    display: flex;
    gap: 10px;
    margin-left: 20px;
    font-weight: 600;
    cursor: pointer;
}
.item-cmt .comment ul i {
    margin-right: 5px;
}
.post-comment {
    display: flex;
    margin-top: 20px;
    position: relative;
}

.post-comment input {
    margin-left: 10px;
    width: 100%;
    border: 0px;
    outline: none;
    border: 1px solid;
    border-color: #e7edf277;
    border-radius: 20px;
    padding: 0px 45px 0px 2%;
    font-size: 13px;
    height: 40px;
    margin-top: 5px;
}
.post-comment .avt {
    border-radius: 100%;
    width: 45px;
    height: 45px;
}
.post-comment i {
    position: absolute;
    right: 20px;
    top: 20%;
    transform: translate(-50%, 50%);
}
</style>
<script>
import $ from "jquery";
import { GetUserProfile, AddFriend } from "../../services/Users";
export default {
    setup() {},
    components: {},
    data() {
        return {
            UserProfile: "",
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
            });
        },
        AddFriend(id) {
            const data = {
                sendTo: id,
                sendFrom: this.userInfor.id,
            };
            AddFriend(data).then(function (res) {
                console.log(res);
            });
        },
    },
};
</script>
