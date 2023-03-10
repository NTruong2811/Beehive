<template>
    <TabContents :dataTab="TabContents"></TabContents>
    <div class="watch">
        <router-view></router-view>
        <!-- More videos -->
    </div>
</template>
<style scoped>
.watch {
    display: flex;
    flex-direction: column;
    align-items: center;
    /* padding: 0px  15%; */
    height: auto;
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
import TabContents from "../components/TabContents.vue";

export default {
    components: { TabContents },
    data() {
        return {
            TabContents: [
                {
                    name: "Watchs",
                    path: "/watch",
                },
                {
                    name: "Musics",
                    path: "/watch/musics",
                },
                {
                    name: "Videos",
                    path: "/watch/videos",
                },
            ],
        };
    },
};
</script>
