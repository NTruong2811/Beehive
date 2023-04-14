<template>
    <TabContents :dataTab="TabContents"></TabContents>
    <div class="watch">
        <router-view></router-view>
        <!-- More videos -->
    </div>
</template>
<style scoped>


</style>

<script>
import TabContents from "../Tabs/TabContents.vue";

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
