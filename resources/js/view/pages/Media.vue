<template>
    <div class="media">
        <div class="music-container" v-for="item in musics" :key="item">
            <music :MusicDetail="item"></music>
        </div>
        <div
            class="video-container"
            v-for="(item, index) in videos"
            :key="item"
            :id="'video' + index"
        >
            <videocm :VideoDetail="item"></videocm>
        </div>
        <!-- More videos -->
    </div>
</template>
<style scoped>
.media {
    display: flex;
    flex-direction: column;
    align-items: center;
    /* padding: 0px  15%; */
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
import $ from "jquery";
import videocm from "../components/media/video.vue";
import music from "../components/media/music.vue";
import Music from "../components/media/music.vue";
export default {
    components: { videocm, Music },
    data() {
        return {
            videos: [
                {
                    src: "videos/The-Atomic-Heart-bantumlum.mp4",
                },
                {
                    src: "videos/The-Atomic-Heart.mp4",
                },
                {
                    src: "videos/The-Atomic-Heart-iron_dick.mp4",
                },
            ],
            musics: [
                {
                    album: "/images/erika.jfif",
                    SongName: "Яд (𝗬𝗔𝗗) ",
                    SongArtist: "Erika Lundmoen",
                    src: "/sounds/Yad.mp3",
                },
                {
                    album: "/images/tuancui.jfif",
                    SongName: "StarBoy",
                    SongArtist: "Tuấn Cùi",
                    src: "/sounds/tuancui.mp3",
                },
                {
                    album: "/images/tuancui.jfif",
                    SongName: "I Was Never There",
                    SongArtist: "Tuấn Cùi",
                    src: "/sounds/tuancui1.mp3",
                },
            ],
        };
    },
    methods: {},
    mounted() {},
};
</script>
