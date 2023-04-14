<template>
    <div class="item" :id="'post_'+PostDetail.id">
        <div class="avt d-none d-lg-block">
            <img :src="PostDetail.user.avatar" alt="" />
        </div>
        <div class="content">
            <div class="item-header">
                <div class="meta">
                    <img class="d-block d-lg-none" :src="PostDetail.user.avatar" alt="" />
                    <div class="post-by">
                        <span>
                            <strong>{{ PostDetail.user.name }}</strong>
                            posted an update</span
                        >
                        <br />
                        <span class="time">{{
                            ConvertTime(PostDetail.created_at)
                        }}</span>
                    </div>
                </div>
                <div class="options">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </div>
            </div>
            <div class="item-content">
                <div class="inner">
                    <div class="description">
                        <span>
                            {{ PostDetail.description }}
                        </span>
                    </div>
                    <div class="media">
                        <ul>
                            <li>
                                <img :src="PostDetail.profile.files" alt="" />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
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
.item {
    display: flex;
    padding: 20px 0px;
    position: relative;
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
    top: 65px;
    left: 22px;
}
@media (max-width: 576px) {
    .item::before {
   display: none;
}
}
.item .avt img {
    width: 45px;
    height: 45px;
    border-radius: 100%;
    z-index: 100;
}
.item .meta img{
    width: 45px;
    height: 45px;
    border-radius: 100%;
    z-index: 100;
    margin-right: 10px;
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
        PostDetail: Object,
    },
    mounted() {

        var VueThis = this;
        $("#post_"+VueThis.PostDetail.id+" .more-desc").click(function () {
            $(this).next().show();
            $(this).hide();
            $("#post_"+VueThis.PostDetail.id+" .hide-desc").show();
        });

        $("#post_"+VueThis.PostDetail.id+" .hide-desc").click(function () {
            $(this).prev().hide();
            $(this).hide();
            $(this).parent().find("#post_"+VueThis.PostDetail.id+" .more-desc").show();
            $("#post_"+VueThis.PostDetail.id+" .more-desc").show()
        });

    },
};
</script>
