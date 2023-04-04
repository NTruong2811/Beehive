<template>
    <div class="video-container col-sm-12 col-md-8">
        <div class="support">
            <div class="exit" @click="back">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
        <video controls autoplay loop :src="Video.file"></video>
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
        <comment-layout :PostId="Detail.id"></comment-layout>
    </div>
</template>
<style scoped>
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
import CommentLayout from "../../layout/CommentLayout.vue";
export default {
    setup() {},
    components: {
        CommentLayout,
    },
    data() {
        return {
            Video: {},
            User: {},
        };
    },
    props: {
        Detail: Object,
    },
    watch: {
        Detail: function (newVal, oldVal) {
            this.Video = newVal.video;
            this.User = newVal.user;
        },
    },
    methods: {
        back() {
            window.history.back();
        },
    },
};
</script>
