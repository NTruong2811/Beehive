<template>
    <div class="newfeeds">
        <div class="newfeeds-stream">
            <ul>
                <li><Post></Post></li>
                <li><Post></Post></li>
            </ul>
        </div>
    </div>
</template>
<style scoped>
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
.newfeeds .newfeeds-stream .item {
    display: flex;
    padding: 20px 0px;
    position: relative;
}
.newfeeds .newfeeds-stream .item::before {
    content: "";
    width: 2px;
    height: 100%;
    background-color: #4f52611c;
    position: absolute;
    top: 65px;
    left: 22px;
}
.newfeeds .newfeeds-stream .item .avt img {
    width: 45px;
    height: 45px;
    border-radius: 100%;
    z-index: 100;
}
.newfeeds .newfeeds-stream .item .content {
    padding: 0px 20px;
}
.newfeeds .newfeeds-stream .item .item-header .meta {
    display: flex;
    font-size: 15px;
}
.newfeeds .newfeeds-stream .item .item-header .meta strong {
    font-weight: 600;
}
.newfeeds .newfeeds-stream .item .item-header {
    display: flex;
    justify-content: space-between;
}
.newfeeds .newfeeds-stream .item .item-header .meta .time {
    font-size: 13px;
    color: rgba(0, 0, 0, 0.363);
}
.newfeeds .newfeeds-stream .item .item-content {
    margin: 15px 0px;
}
.newfeeds .newfeeds-stream .item .item-content .description {
    font-size: 15px;
}
.newfeeds .newfeeds-stream .item .item-content .media ul {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 15px;
    margin-top: 15px;
    width: 100%;
}
.newfeeds .newfeeds-stream .item .item-content .media ul li {
    width: 100%;
    cursor: pointer;
}
.newfeeds .newfeeds-stream .item .item-content .media ul li:first-child {
    grid-column-start: 1;
    grid-column-end: 4;
}
.newfeeds .newfeeds-stream .item .item-content .media ul li img {
    width: 100%;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px,
        rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
}
.newfeeds .newfeeds-stream .item .item-content .action ul {
    margin: 15px 0px;
    display: flex;
    gap: 20px;
    border: 1px solid #4f52611c;
    border-left: 0px;
    border-right: 0px;
    padding: 15px 0px;
}
.newfeeds .newfeeds-stream .item .item-content .action ul li {
    display: flex;
    gap: 8px;
    color: #4f5261d7;
}
.newfeeds .newfeeds-stream .item .item-content .action ul li .quantity {
    background-color: #4f52611c;
    padding: 0px 5px;
    border-radius: 100%;
}
.newfeeds .newfeeds-stream .item .item-content .action ul li i {
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
import Post from "../components/Post.vue";
import $ from "jquery";
export default {
    setup() {},
    props: {
        dataTab: Array,
    },
    components: {
        Post,
    },
    mounted() {
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
        this.$emit("update:dataTab", [
            {
                name: "Newfeeds",
                path: "Newfeeds",
            },
            {
                name: "Posts",
                path: "Posts",
            },
            {
                name: "Photos",
                path: "Photos",
            },
        ]);
    },
};
</script>
