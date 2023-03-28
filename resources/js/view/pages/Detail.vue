<template>
    <div class="container-fluid">
        <div class="detail row">
            <router-view :Detail="Detail"></router-view>
        </div>
    </div>
</template>

<style scoped>
.detail {
    position: relative;
    top: 0px;
    left: 0px;
    width: 100vw;
    height: 100vh;
}

</style>

<script>
import { VideoDetail } from "../../services/Watch";
export default {
    setup() {},
    data() {
        return {
            Detail: {},
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
        },
        back() {
            window.history.back();
        },
    },
    mounted() {
        // $(document).keydown((e) => {
        //     if (this.VideosDetail[0].id != this.VideoId) {
        //         if (e.keyCode == 38) {
        //             // truoc khi prev video thi gan id tren url hien tai vao NextVideo
        //             this.NextVideo = this.VideoId;
        //             // thay doi url
        //             this.$router.push("detail?id=" + this.PrevVideo);
        //             this.VideoId = this.PrevVideo;
        //         }
        //     }
        //     if (this.CountVideo <= this.VideosDetail.length) {
        //         if (e.keyCode == 40) {
        //             // truoc khi next video thi gan  id tren url hien tai vao PrevVideo
        //             this.PrevVideo = this.VideoId;
        //             // thay doi url
        //             this.$router.push("detail?id=" + this.NextVideo);
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
