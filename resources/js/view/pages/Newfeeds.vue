<template>
    <TabContents :dataTab="TabContents"></TabContents>
    <div class="newfeeds">
        <div class="newfeeds-stream">
            <ul>
                <li v-for="item in posts" :key="item">
                    <div v-if="item.type_postId == 1">
                        <Post :PostDetail="item"></Post>
                    </div>
                    <div v-if="item.type_postId == 2">
                        <videocm :VideoDetail="item"></videocm>
                    </div>
                    <div v-if="item.type_postId == 3">
                        <music :MusicDetail="item"></music>
                    </div>
                </li>
            </ul>
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
</style>

<script>
import TabContents from "../Tabs/TabContents.vue";
import { newfeeds } from "../../services/NewFeeds";
import Post from "../components/PostComponent/profile.vue";
import videocm from "../components/PostComponent/video.vue";
import music from "../components/PostComponent/music.vue";
import $ from "jquery";
export default {
    data() {
        return {
            TabContents: [
                {
                    name: "Newfeeds",
                    path: "",
                },
            ],
            posts: null,
        };
    },
    components: {
        Post,
        videocm,
        music,
        TabContents,
    },
    created() {
        this.GetNewFeeds();
    },
    methods: {
        async GetNewFeeds() {
            this.posts = await newfeeds().then((res) => {
                return res.data.data;
            }).catch((e)=>{
                console.log(e.request.response);
            });
        },
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
