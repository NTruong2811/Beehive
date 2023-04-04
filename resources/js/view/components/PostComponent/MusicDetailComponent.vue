<template :key="Reset">
    <div
        class="music-container col-sm-12 col-md-8"
        v-bind:style="{
            backgroundImage: 'url(' + Music.image_file + ')',
        }"
    >
        <div class="support">
            <div class="exit" @click="back">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        <div class="bg-img"></div>
        <div id="album">
            <div
                id="cover"
                v-bind:style="{
                    backgroundImage: 'url(' + Music.image_file + ')',
                }"
            >
                <div id="print"></div>
            </div>
            <div class="infor">
                <span class="song_name">{{ Music.song_name }}</span>
                <div class="line"></div>
                <span class="song_artist">{{ Music.song_artist }}</span>
            </div>
        </div>
        <div class="audio">
            <div class="control">
                <div v-if="PostDetail.next_post != null" class="">
                    <router-link
                        :to="{
                            path: '/detail/music',
                            query: {
                                id: PostDetail.next_post.id,
                            },
                        }"
                    >
                        <i
                            class="fa-solid fa-backward-step"
                            @click="ResetComponent"
                        ></i>
                    </router-link>
                </div>
                <div v-if="PostDetail.next_post == null" class="">
                    <i class="fa-solid fa-backward-step not_exist"></i>
                </div>
                <div v-if="PostDetail.prev_post != null" class="">
                    <router-link
                        :to="{
                            path: '/detail/music',
                            query: {
                                id: PostDetail.prev_post.id,
                            },
                        }"
                    >
                        <i
                            class="fa-solid fa-forward-step"
                            @click="ResetComponent"
                        ></i>
                    </router-link>
                </div>
                <div v-if="PostDetail.prev_post == null" class="">
                    <i class="fa-solid fa-forward-step not_exist"></i>
                </div>
                <i class="fa-solid fa-rotate-right" @click="loop"></i>
            </div>
        </div>
    </div>
    <div class="music-info col-sm-12 col-md-4">
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
<<<<<<< HEAD
            <p class="post-description">{{ PostDetail.description }}</p>
=======
            <p class="post-description">{{ Detail.description }}</p>
            <traffic-detail-component></traffic-detail-component>
>>>>>>> Feature/Post
        </div>
        <comment-layout :PostId="PostDetail.id"></comment-layout>
    </div>
</template>
<style scoped>
.music-container {
    position: relative;
    overflow: hidden;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
}
hr {
    margin: 0px !important;
    position: relative;
    width: 120%;
    left: -10%;
}
.support {
    position: absolute;
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
.music-container {
    background-color: black;
    height: 100vh;
}
.bg-img {
    background-color: transparent;
    background-image: radial-gradient(
        at top center,
        rgba(0, 0, 0, 0.2) 0%,
        rgba(0, 0, 0, 0.9) 70%
    );
    opacity: 1;
    transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
    width: 100%;
    height: 100%;
    /* position: absolute; */
    z-index: 1;
    background-position: center center;
    /* filter: blur(5px); */
}
#album {
    position: absolute;
    top: 43%;
    left: 50%;
    transform: translate(-50%, -50%);
    height: 30vw;
    width: 45%;
    max-height: 75%;
    max-width: 75vh;
}
#album .infor {
    position: absolute;
    bottom: -90px;
    width: 100%;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    gap: 5px;
}
#album .infor .line {
    width: 80px;
    height: 3px;
    background-color: white;
}

#album .infor .song_name {
    color: white;
    font-size: 30px;
    font-weight: 500;
}
#album .infor .song_artist {
    font-size: 15px;
    font-weight: 500;
    color: white;
}
#cover {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    width: 100%;
    height: 100%;
    background-size: 100% 100%;
    box-shadow: 5px 0 20px 0 rgba(0, 0, 0, 0.6),
        inset 0 0 10px 5px rgba(255, 255, 255, 0.2),
        inset 0 0 4px 2px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
}
#cover::before {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 10;
    width: 100%;
    height: 100%;
    background-image: url("/images/bg_music.jpg");
    background-size: 100% 100%;
    border-radius: 10px;
    mix-blend-mode: screen;
    opacity: 0.5;
    content: "";
}
#cover::after {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 20;
    width: 100%;
    height: 100%;
    background-image: url("/images/lightling_music.jpg");
    background-size: 100% 100%;
    border-radius: 10px;
    mix-blend-mode: screen;
    opacity: 0.2;
    content: "";
}

@keyframes getOut {
    0% {
        left: 0;
    }
    100% {
        left: 50%;
    }
}
@keyframes spinThat {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
#music {
    position: absolute;
    bottom: 0px;
    width: 100%;
}
.post-info {
    display: flex;
    flex-direction: column;
    width: 100%;
    border-bottom: 1px solid rgba(22, 24, 35, 0.2);
    padding: 20px;
}
.music-info {
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

.music-description p {
    font-size: 16px;
    margin-bottom: 10px;
}
audio::-webkit-media-controls-panel,
video::-webkit-media-controls-panel {
    background-color: red;
}
.my-audio::-webkit-media-controls-panel {
    background-color: red;
}
.audio {
    width: 100%;
    padding: 0px;
    height: 50px;
    position: absolute;
    bottom: 0px;
    background-color: #f1f3f4;
    display: flex;
    align-items: center;
    overflow: hidden;
}
.audio .control {
    position: relative;
    left: 20px;
    display: flex;
    height: 100%;
    align-items: center;
    margin-right: 10px;
    z-index: 1;
}
.audio i {
    color: #000000;
    cursor: pointer;
    width: 33px;
    height: 33px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 100%;
}
.audio i:hover {
    background-color: #e5e7e8;
}
.control .active {
    color: #8224e3;
}
.control .not_exist {
    color: #c1c2c3;
}
@media only screen and (max-width: 600px) {
    #album {
        height: 80vw;
        width: 80%;
    }
    .bg-img {
        width: 100vh;
    }
}
</style>
<script>
import CommentLayout from "../../layout/CommentLayout.vue";
import TrafficDetailComponent from "../TrafficComponent/TrafficDetailComponent.vue";
import $ from "jquery";
import { GetPostDetail } from "../../../services/Post";
export default {
    setup() {
        return {
            loop: false,
        };
    },
    components: {
        CommentLayout,
        TrafficDetailComponent
    },
    data() {
        return {
            Music: {},
            User: {},
            PostDetail: {},
            Reset: 0,
        };
    },
    props: {
        Detail: Object,
    },
    watch: {
        Detail: function (newVal, oldVal) {
            this.Music = newVal.music;
            this.User = newVal.user;
            this.PostDetail = newVal;
            $(".audio").append(`
            <audio controls autoplay class="my-audio w-100"
            >
                <source src="${this.Music.song_file}" type="audio/mpeg" />
                Your browser does not support the audio element.
            </audio>`);
        },
        "$route.query.id": {
            immediate: true,
            handler(newValue, oldValue) {
                GetPostDetail(newValue).then((res) => {
                    this.Music = res.data.music;
                    this.User = res.data.user;
                    this.PostDetail = res.data;
                    $("audio").remove();
                    $(".audio").append(`
            <audio controls autoplay class="my-audio w-100"
            >
                <source src="${this.Music.song_file}" type="audio/mpeg" />
                Your browser does not support the audio element.
            </audio>`);
                });
            },
        },
    },
    methods: {
        back() {
            window.history.back();
        },
        loop() {
            if (this.loop == false) {
                $("audio").attr("loop", "loop");
                $(".fa-rotate-right").addClass("active");
                this.loop = true;
            } else {
                $("audio").removeAttr("loop");
                $(".fa-rotate-right").removeClass("active");
                this.loop = false;
            }
        },
        ResetComponent() {
            this.Reset += 1;
        },
    },
};
</script>
