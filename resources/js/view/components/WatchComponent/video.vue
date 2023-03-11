<template>
    <div class="item" :data-video="VideoDetail.video.src">
        <div class="avt">
            <img :src="VideoDetail.user.avatar" alt="" />
        </div>
        <div class="content">
            <div class="item-header">
                <div class="meta">
                    <div class="post-by">
                        <span>
                            <strong>{{ VideoDetail.user.name }}</strong>
                            posted an update</span
                        >
                        <br />
                        <span class="time">{{ VideoDetail.created_at }}</span>
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
                            <div class="short-desc">
                                At vero eos et accusamus et iusto odio
                                dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti quos dolores
                                et quas molestias excepturi sint occaecati
                                cupiditate non provident, similique sunt in cul
                                <span class="more-desc">...read more</span>
                                <span class="all-desc" style="display: none"
                                    >At vero eos et accusamus et iusto odio
                                    dignissimos ducimus qui blanditiis
                                    praesentium voluptatum deleniti atque
                                    corrupti quos dolores et quas molestias
                                    excepturi sint occaecati cupiditate non
                                    provident, similique sunt in culpa qui
                                    officia deserunt mollitia animi, id est
                                    laborum et dolorum fuga. Et harum quidem
                                    rerum facilis est et expedita distinctio.
                                    Nam libero tempore, cum soluta nobis est
                                    eligendi optio cumque nihil impedit quo
                                    minus id quod maxime placeat facere
                                    possimus, omnis voluptas assumenda est,
                                    omnis dolor repellendus. Temporibus autem
                                    quibusdam et aut officiis debitis aut rerum
                                    necessitatibus saepe eveniet ut et
                                    voluptates repudiandae sint et molestiae non
                                    recusandae. Itaque earum rerum hic tenetur a
                                    sapiente delectus, ut aut reiciendis
                                    voluptatibus maiores alias consequatur aut
                                    perferendis doloribus asperiores
                                    repellat.<br />
                                </span>
                                <span class="hide-desc" style="display: none"
                                    >hide</span
                                >
                            </div>
                        </span>
                    </div>
                </div>
            </div>
            <div class="item-video">
                <video :src="VideoDetail.video.src" controls loop></video>
                <traffic></traffic>
            </div>
        </div>
    </div>
</template>
<style scoped>
video::-webkit-media-controls-fullscreen-button {
    display: none;
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
    margin: 10px 0px;
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
.item-video {
    width: 100%;
    overflow: hidden;
    display: flex;
}
.item-video video {
    max-width: 100%;
    height: 500px;
    cursor: pointer;
    border-radius: 20px;
    box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
}

/* traffic */
.traffic {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-end;
    margin-top: 20px;
}
</style>

<script>
import $ from "jquery";
import traffic from "../traffics/traffic.vue";
export default {
    setup() {},
    components: {
        traffic,
    },
    props: {
        VideoDetail: Object,
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
        var VueThis = this;
        var observer = new IntersectionObserver(
            function (entries, observer) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        $(
                            "[src='" + VueThis.VideoDetail.video.src + "']"
                        )[0].play();
                    } else {
                        $(
                            "[src='" + VueThis.VideoDetail.video.src + "']"
                        )[0].pause();
                    }
                });
            },
            { threshold: 0, rootMargin: "-350px 0px" }
        );
        observer.observe(
            $("[data-video='" + this.VideoDetail.video.src + "']")[0]
        );
    },
};
</script>
