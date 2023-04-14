<template>
    <div class="watchs">
        <div class="watch-container">
            <div class="item" v-for="item in WatchList" :key="item">
                <div class="music-container" v-if="item.type_postId == 3">
                    <music :MusicDetail="item"></music>
                </div>
                <div class="video-container" v-if="item.type_postId == 2">
                    <videocm :VideoDetail="item"></videocm>
                </div>
            </div>
        </div>
        <!-- More videos -->
    </div>
</template>
<style scoped>
.watch {
    display: flex;
    flex-direction: column;
    align-items: center;
    /* padding: 0px  15%; */
    height: 100%;
}

.watch-container {
    position: relative;
    width: 100%;
    height: auto;
}

.video-container {
    position: relative;
    width: 100%;
    height: auto;
}

.video {
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.video-info {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    color: #fff;
    padding: 10px;
    box-sizing: border-box;
}

.video-title {
    font-size: 20px;
    margin: 0 0 5px 0;
}

.video-description {
    font-size: 16px;
    margin: 0 0 10px 0;
}

.user-info {
    display: flex;
    align-items: center;
}

.user-avatar {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin-right: 10px;
}

.user-name {
    font-size: 16px;
    margin: 0;
}
</style>

<script>

import videocm from "../PostComponent/video.vue";
import Music from "../PostComponent/music.vue";

import { GetWatchsProfile } from "../../../services/Users";

import $ from "jquery";
export default {
    components: { videocm, Music },
    props: {},
    data() {
        return {
            WatchList: [],
            isLoading: false,
            NextPage: null,
        };
    },
    created() {

    },
    watch: {
        "$route.query.id": {
            immediate: true,
            handler(newValue, oldValue) {
                GetWatchsProfile(newValue).then((res) => {
                    this.NextPage = res.data.current_page + 1;
                    this.WatchList = res.data.data;
                });
            },
        },
    }
};
</script>
