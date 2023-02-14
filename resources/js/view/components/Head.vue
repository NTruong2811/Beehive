<template>
    <div class="head">
        <div class="search">
            <form action="" method="get" id="search" @submit.prevent="search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search..." name="search" />
                <button hidden type="submit"></button>
            </form>
            <div class="search-result">
                <TabContents :dataTab="TabContents"></TabContents>
                <SearchResult
                    :SearchResult="SearchResult"
                    :key="re_renderKey"
                ></SearchResult>
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
                <li>
                    <img class="avt" src="" alt="" />
                </li>
            </ul>
        </div>
    </div>
</template>
<style scoped>
.tabcontent {
    margin: -10px 0px 0px 0px;
}

.head {
    border-bottom: 1px solid #4f52611c;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0px 3% 0px 7% !important;
    transition: all 0.5s 0.1s;
    width: inherit;
    position: fixed;
    background-color: #fbfafc;
    right: 0px;
    z-index: 99999;
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

import TabContents from "../components/TabContents.vue";
import SearchResult from "../components/SearchResult.vue";
import { search } from "../../services/GlobalAction";
export default {
    setup() {},
    data() {
        return {
            TabContents: [
                { name: "Pepoles", path: "Pepoles" },
                { name: "Photos", path: "Photos" },
                { name: "Friends", path: "Friends" },
            ],
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
    },
    methods: {
        async search(e) {
            var keyword = e.target.search.value;
            $(".search-result").show();
            this.SearchResult = await search(keyword).then(function (res) {
                const { data } = res;
                return data;
            });
            console.log(this.SearchResult);
            this.re_renderKey += 1;
        },
    },
};
</script>
