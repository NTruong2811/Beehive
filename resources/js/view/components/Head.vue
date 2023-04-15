<template>
    <div class="head">
        <div class="main">
            <div class="search">
                <form action="" method="get" id="search" @submit.prevent="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search..." name="search" />
                    <button hidden type="submit"></button>
                </form>
                <div class="search-result">
                    <!-- <TabContents :dataTab="TabContents"></TabContents> -->
                    <SearchResult :SearchResult="SearchResult" :key="re_renderKey"></SearchResult>
                </div>
            </div>
            <div class="nav">
                <ul>
                    <li>
                        <i class="fa-solid fa-user-plus"></i>
                        <div class="num">
                            <span>10</span>
                        </div>
                    </li>
                    <li>
                        <i class="fa-solid fa-bell"></i>
                        <div class="num">
                            <span>0</span>
                        </div>
                    </li>
                    <li>
                        <i class="fa-solid fa-bag-shopping"></i>
                        <div class="num">
                            <span>0</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="beehive-navbar-mobile d--sm-block d-md-none">
            <ul>
                <router-link to="/">
                    <li class="">
                        <i class="fa-solid fa-signs-post"></i>
                    </li>
                </router-link>
                <router-link :to="{
                    path: '/friendships',
                    query: { id: this.userInfor.id },
                }">
                    <li>
                        <i class="fa-solid fa-users"></i>
                    </li>
                </router-link>
                <router-link to="/shop">
                    <li><i class="fa-solid fa-shop"></i></li>
                </router-link>
                <router-link to="/watch">
                    <li>
                        <i class="fa-solid fa-forward-step"></i>
                    </li>
                </router-link>
                    <li>
                        <router-link :to="{
                            path: '/profile',
                            query: { id: this.userInfor.id }
                        }">
                            <div class="user">
                                <div class="avt">
                                    <img :src="this.userInfor.avatar" alt="" />
                                </div>
                            </div>
                        </router-link>
                    </li>
            </ul>
        </div>
    </div>
</template>
<style scoped>
@media (max-width: 576px) {
    .head {
        height: 50px !important;
    }

}

.beehive-navbar-mobile {
    position: absolute;
    bottom: -40px;
    height: 40px;
    background-color: white;
    display: flex;
    justify-content: space-around;
    background-color: #fbfafc;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;
}

.beehive-navbar-mobile {
    width: 100%;
}

.beehive-navbar-mobile .user {
    width: 30px;
    height: 30px;
}

.beehive-navbar-mobile .user .avt {
    width: 100%;
    /* margin: 15%; */
    border: 1px solid #4f5261;
    border-radius: 100%;
    padding: 5%;
}

.beehive-navbar-mobile ul {
    width: 100%;
    display: flex;
    justify-content: space-around;
    margin: 0px 10px;
}

.beehive-navbar-mobile ul a {
    color: #4f5261bb;
}
ul .active {
    color: #8224e3;
}
.user .avt img {
    width: 100%;
    border-radius: 100%;
}

.tabcontent {
    margin: -10px 0px 0px 0px;
}

.head {
    border-bottom: 1px solid #4f52611c;
    height: 80px;
    transition: all 0.5s 0.1s;
    width: inherit;
    position: fixed;
    background-color: #fbfafc;
    right: 0px;
    z-index: 999;
}

.head .main {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0px 3% 0px 7% !important;
    height: 100%;
}

.head .search {
    width: 100%;
}

.head .search i {
    margin-right: 10px !important;
}

.head .search input {
    border: 0px;
    background-color: #fbfafc;
    width: 100%;
}

.head #search {
    display: flex;
    flex-wrap: nowrap;
}

.head #search i {
    margin-top: 5px;
}

.head .search input {
    outline: none;
    width: 100%;
}

.nav .avt {
    width: 50px;
    height: 50px;
    border-radius: 100%;
    margin-top: 15px;
}

.head ul {
    display: flex;
    align-items: center;
    gap: 30px;
    height: 100%;
    padding: 0px !important;
}

.head ul li {
    list-style: none;
    position: relative;
    cursor: pointer;
}

.head ul li .num {
    position: absolute;
    right: -5px;
    top: 16px;
    color: white;
    background-color: red;
    height: auto;
    padding: 0px 3px !important;
    border-radius: 100%;
    font-size: 10px;
}

.search-result {
    position: absolute;
    top: 80px;
    background-color: #fbfafc;
    left: 0px;
    width: 100%;
    height: 70vh;
    transition: all 0.5s 0.1s;
    box-shadow: rgba(17, 17, 26, 0.295) 0px 1px 0px;
    padding: 3% 3% 3% 7% !important;
    display: none;
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

.result_list {
    overflow-y: scroll;
    max-height: 100%;
}

.result_list .infor {
    display: flex;
    gap: 10px;
    margin: 5px 0px;
    cursor: pointer;
    margin: 10px 0px;
}

.result_list .avt img {
    width: 42px;
    height: 42px;
    border-radius: 100%;
    z-index: 100;
}
</style>
<script>
import $ from "jquery";
import axios from "axios";

import TabContents from "../Tabs/TabContents.vue";
import SearchResult from "../components/SearchResult.vue";
import { search } from "../../services/GlobalAction";
export default {
    setup() { },
    data() {
        return {
            // TabContents: [
            //     { name: "Pepoles", path: "Pepoles" },
            //     { name: "Photos", path: "Photos" },
            //     { name: "Friends", path: "Friends" },
            // ],
            SearchResult: [],
            re_renderKey: 0,
        };
    },
    components: {
        TabContents,
        SearchResult,
    },
    mounted() {
        $(document).on("click", function (e) {
            if ($(e.target).closest(".search-result").length === 0) {
                $(".search-result").hide();
            }
        });
        var nav = $(".beehive-navbar-mobile ul li");
        var url = location.pathname;

        if (url == "/") {
            nav[0].classList.add("active");
        }

        for (let index = 0; index < nav.length; index++) {
            if (nav[index].closest("a") != null) {
                let el = nav[index].closest("a").getAttribute("href");
                if (url == el) {
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

    },
    methods: {
        async search(e) {
            var keyword = e.target.search.value;
            $(".search-result").show();
            this.SearchResult = await search(keyword).then(function (res) {
                const { data } = res;
                return data;
            });
            this.re_renderKey += 1;
        },
    },
};
</script>
