<template>
    <div class="container-fluid">
        <div class="video-detail row">
            <div class="video-container col-sm-12 col-md-8">
                <div class="support">
                    <div class="exit" @click="back">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>
                <video controls autoplay loop :src="Video.src"></video>
            </div>
            <div class="video-info col-sm-12 col-md-4">
                <div class="post-info">
                    <div class="user-info">
                        <div class="user-details">
                            <div class="avt">
                                <img :src="User.avatar" alt="User Avatar" />
                            </div>
                            <h3>{{ User.name }}</h3>
                        </div>
                        <button
                            v-if="User.id != this.userInfor.id"
                            class="add-friend-btn"
                        >
                            Add Friend
                        </button>
                    </div>
                    <p class="post-description">{{ Detail.description }}</p>
                </div>
                <div class="comments">
                    <div class="content" id="content">
                        <ul class="main-comment">
                            <li>
                                <Comment></Comment>
                            </li>
                        </ul>
                    </div>
                    <form class="post-comment" @submit.prevent="UpdateCmt">
                        <input
                            type="text"
                            placeholder="Write some thing..."
                            name="comment"
                        />
                        <button type="submit">
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.video-detail {
    position: relative;
    top: 0px;
    left: 0px;
    width: 100vw;
    height: 100vh;
}
hr {
    margin: 0px !important;
    position: relative;
    width: 120%;
    left: -10%;
}
.support {
    position: fixed;
    top: 0px;
    left: 0px;
    width: inherit;
    padding: 20px;
    z-index: 100;
}
.support .exit {
    width: 40px;
    height: 40px;
    background-color: rgba(84, 84, 84, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    border-radius: 100%;
}
.support .exit i {
    color: white;
    font-size: 22px;
}
.video-container {
    background-color: black;
    height: 100vh;
}
.video-container video {
    width: 100%;
    height: 100vh;
    background-color: #000;
    margin: 0 auto;
    display: block;
    outline: none;
}

.post-info {
    display: flex;
    flex-direction: column;
    width: 100%;
    border-bottom: 1px solid rgba(22, 24, 35, 0.2);
    padding: 20px;
}
.video-info {
    height: 100vh;
    display: flex;
    flex-direction: column;
    /* width: 100%; */
    position: relative;
    overflow: hidden;
}
.user-info {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}
.user-details {
    display: flex;
    align-items: center;
    gap: 10px;
}
.user-details .avt {
    width: 50px;
    height: 50px;
    overflow: hidden;
    border: 1px solid #4f5261;
    border-radius: 100%;
    padding: 2%;
}
.user-details img {
    border-radius: 100%;
    width: 100%;
}
.user-details h3 {
    margin: 0;
    font-size: 16px;
    font-weight: bold;
}

.add-friend-btn {
    margin-left: auto;
    background-image: linear-gradient(
        90deg,
        #8224e3 0,
        #a968ec 50%,
        #8224e3 100%
    );
    border: 0px;
    box-shadow: 0 1px 2px 0 rgb(130 36 227 / 50%);
    color: white;
    font-size: 12px;
    outline: none;
    padding: 8px 40px;
    /* border-radius: 20px; */
}

.post-description {
    margin: 0;
    font-size: 14px;
    line-height: 1.5;
}

.video-description p {
    font-size: 16px;
    margin-bottom: 10px;
}
</style>

<script>
import CommentLayout from "../components/CommentComponent/CommentLayout.vue";
import Comment from "../components/CommentComponent/Comment.vue";
import { VideoDetail } from "../../services/Watch";
export default {
    setup() {},
    components: {
        CommentLayout,
        Comment,
    },
    data() {
        return {
            Detail: {},
            Video: {},
            User: {},
            VideoId: this.$route.query.id,
            // NextVideo: null,
            // PrevVideo: null,
            // CountVideo: 1,
        };
    },
    created() {
        this.GetVideoDetail(this.VideoId);
    },
    methods: {
        async GetVideoDetail(id) {
            this.Detail = await VideoDetail(id).then((res) => {
                return res.data;
            });
            this.Video = this.Detail.video;
            this.User = this.Detail.user;
        },
        back() {
            window.history.back();
        },
        UpdateCmt(e) {
            console.log(e);
        },
    },
    mounted() {
        // $(document).keydown((e) => {
        //     if (this.VideosDetail[0].id != this.VideoId) {
        //         if (e.keyCode == 38) {
        //             // truoc khi prev video thi gan id tren url hien tai vao NextVideo
        //             this.NextVideo = this.VideoId;
        //             // thay doi url
        //             this.$router.push("video-detail?id=" + this.PrevVideo);
        //             this.VideoId = this.PrevVideo;
        //         }
        //     }
        //     if (this.CountVideo <= this.VideosDetail.length) {
        //         if (e.keyCode == 40) {
        //             // truoc khi next video thi gan  id tren url hien tai vao PrevVideo
        //             this.PrevVideo = this.VideoId;
        //             // thay doi url
        //             this.$router.push("video-detail?id=" + this.NextVideo);
        //             // gan cho videoid id cua video moi next
        //             this.VideoId = this.NextVideo;
        //             this.CountVideo += 1;
        //             this.NextVideo = this.VideosDetail[this.CountVideo].id;
        //         }
        //     }
        // });
        // $(document).ready(() => {
        //     console.log($(".container-fluid").find(".row"));
        // });
        // var VueThis = this;
        // var observer = new IntersectionObserver(
        //     function (entries, observer) {
        //         entries.forEach(function (entry) {
        //             if (entry.isIntersecting) {
        //             } else {
        //             }
        //         });
        //     },
        //     { threshold: 0, rootMargin: "-350px 0px" }
        // );
    },
};
</script>



<style scoped>
.comments {
    background-color: #f8f8f8;
    height: 100%;
}
.comments .content {
    padding: 0px 20px 20px 20px;
    height: 82%;
    z-index: 0;
}
.main-comment {
    max-height: 100%;
    padding-top: 20px !important;
}
.sub-comment {
    position: absolute;
}
ul {
    padding: 0px !important;
    margin: 0px !important;
    overflow-y: auto;
}
.comments .content ul li {
    list-style: none;
}
.post-comment {
    display: flex;
    align-items: center;
    position: absolute;
    bottom: 0px;
    width: 100%;
    background-color: white;
    height: 60px;
    z-index: 100;
}

.post-comment input {
    margin: 0px 20px;
    width: 100%;
    border: 0px;
    outline: none;
    border: 1px solid;
    border-color: #e7edf277;
    /* padding: 0px 25px 0px 2%; */
    font-size: 13px;
    height: 40px;
    background-color: #f8f8f8;
    padding: 0px 50px 0px 10px;
}
.post-comment .avt {
    border-radius: 100%;
    width: 45px;
    height: 45px;
}
.post-comment button {
    position: absolute;
    right: 20px;
    top: 8%;
    background-color: transparent;
    border: 0px;
    transform: translate(-50%, 50%);
}

li:last-child {
    padding-bottom: 50px;
}
</style>
