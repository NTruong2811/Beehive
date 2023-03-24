<template>
    <div class="item">
        <div class="avt">
            <img :src="CommentDetail.user.avatar" alt="" />
        </div>
        <div class="content">
            <div class="item-header">
                <div class="meta">
                    <div class="post-by">
                        <span>
                            <strong>{{ CommentDetail.user.name }}</strong>
                            posted an update</span
                        >
                        <br />
                        <span class="time">4 weeks ago</span>
                    </div>
                </div>
                <div class="options">
                    <small>({{ CommentDetail.like }})</small>
                    <i class="fa-regular fa-heart"></i>
                </div>
            </div>
            <div class="item-content">
                <div class="inner">
                    <div class="description">
                        <span>
                            <div class="short-desc">
                                {{ CommentDetail.content }}
                            </div>
                        </span>
                    </div>
                </div>
                <div class="rep">
                    <span id="view-more"
                        >View more replies ({{ CommentDetail.replies.length }})
                        <i class="fa-solid fa-chevron-down"></i
                    ></span>
                    <span id="rep-buton">Reply</span>
                </div>
                <ul class="re-comment main-comment">
                    <li v-for="item in CommentDetail.replies" :key="item">
                        <div class="item">
                            <div class="avt">
                                <img :src="item.user.avatar" alt="" />
                            </div>
                            <div class="content">
                                <div class="item-header">
                                    <div class="meta">
                                        <div class="post-by">
                                            <span>
                                                <strong>{{
                                                    item.user.name
                                                }}</strong>
                                                posted an update</span
                                            >
                                            <br />
                                            <span class="time"
                                                >4 weeks ago</span
                                            >
                                        </div>
                                    </div>
                                    <div class="options">
                                        <small>({{ item.like }})</small
                                        ><i class="fa-regular fa-heart"></i>
                                    </div>
                                </div>
                                <div class="item-content">
                                    <div class="inner">
                                        <div class="description">
                                            <span>
                                                <div class="short-desc">
                                                    {{ item.content }}
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="rep">
                                    <span id="view-more"></span>
                                    <span id="rep-buton">Reply</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<style scoped>
.re-comment {
    margin-top: 20px;
}
.re-comment .item {
    margin-top: 10px;
}
.item-content span {
    font-size: 14px;
}
small {
    font-size: 12px;
}
.options {
    display: flex;
    flex-direction: column;
    align-items: center;
}
.rep {
    display: flex;
    justify-content: space-between;
    margin-top: 5px;
}
#view-more {
    margin: 0px 0px;
    font-weight: 500;
    cursor: pointer;
    text-decoration: underline;
}
#rep-buton {
    margin: 0px 0px;
    font-weight: 500;
    cursor: pointer;
}
.short-desc {
    position: relative;
}
.more-desc,
.hide-desc {
    color: #8224e3;
    font-size: 15px;
    cursor: pointer;
}

li {
    list-style: none;
}
.item {
    display: flex;
    position: relative;
    overflow: hidden;
}
.item::before {
    content: "";
    width: 2px;
    height: 100%;
    background: rgb(120, 120, 120);
    background: linear-gradient(
        180deg,
        rgba(120, 120, 120, 1) 0%,
        rgba(248, 248, 248, 1) 100%
    );
    position: absolute;
    top: 0px;
    left: 22px;
}
.item .avt {
    z-index: 100;
}
.item .avt img {
    width: 45px;
    height: 45px;
    border-radius: 100%;
}
.item .content {
    padding: 0px 20px;
    width: 100%;
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
    margin: 5px 0px;
}
.item .item-content .description {
    font-size: 15px;
}
.item .item-content .media ul {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 15px;
    margin-top: 15px;
    width: 100%;
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
export default {
    setup() {},
    props: {
        CommentDetail: Object,
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
    },
};
</script>
