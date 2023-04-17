<template>
    <div class="item" :id="'post_' + MusicDetail.id" :data-music="MusicDetail.music.song_file">
        <div class="avt d-none d-lg-block">
            <img :src="MusicDetail.user.avatar" alt="" />
        </div>
        <div class="content">
            <div class="item-header">
                <div class="meta">
                    <img class="d-block d-lg-none" :src="MusicDetail.user.avatar" alt="" />
                    <div class="post-by">
                        <span>
                            <strong>{{ MusicDetail.user.name }}</strong>
                            posted an update</span>
                        <br />
                        <span class="time">{{
                            ConvertTime(MusicDetail.created_at)
                        }}</span>
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
                                {{ MusicDetail.description }}
                                At vero eos et accusamus et iusto odio
                                dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti quos dolores
                                et quas molestias excepturi sint occaecati
                                cupiditate non provident, similique sunt in cul
                                <span class="more-desc">...read more</span>
                                <span class="all-desc" style="display: none">At vero eos et accusamus et iusto odio
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
                                <span class="hide-desc" style="display: none">hide</span>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
            <div class="item-music">
                <div class="music-player">
                    <div class="music-info">
                        <div class="album-art">
                            <img :src="MusicDetail.music.image_file" alt="Album Art" />
                        </div>
                        <div class="song-details">
                            <h2 class="song-title">
                                {{ MusicDetail.music.song_name }}
                            </h2>
                            <p class="artist-name">
                                {{ MusicDetail.music.song_artist }}
                            </p>
                        </div>
                    </div>
                    <div class="player-controls">
                        <audio controls loop>
                            <!-- <source src="horse.ogg" type="audio/ogg" /> -->
                            <source :src="MusicDetail.music.song_file" type="audio/mpeg" />
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                </div>
            </div>
            <Activity :PostDetail="MusicDetail"></Activity>
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

.item {
    width: 100%;
    display: flex;
    padding: 20px 0px;
    position: relative;
    margin: 10px 0px;
}

.item::before {
    content: "";
    width: 2px;
    height: 100%;
    background: rgb(120, 120, 120);
    background: linear-gradient(180deg,
            rgba(120, 120, 120, 1) 0%,
            rgba(248, 248, 248, 1) 100%);
    position: absolute;
    top: 65px;
    left: 22px;
}

@media (max-width: 576px) {
    .item::before {
        display: none;
    }
}

.item .meta img {
    width: 45px;
    height: 45px;
    border-radius: 100%;
    z-index: 100;
    margin-right: 10px;
}

.item .avt img {
    width: 45px;
    height: 45px;
    border-radius: 100%;
    z-index: 100;
}

.item .content {
    width: 100%;
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

.music-player {
    display: flex;
    flex-direction: column;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
    padding: 20px;
    width: 450px;
}

.music-info {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.album-art {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 20px;
}

.album-art img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.song-details {
    display: flex;
    flex-direction: column;
}

.song-title {
    margin: 0 0 10px 0;
    font-size: 24px;
}

.artist-name {
    margin: 0;
    font-size: 16px;
    color: #999;
}

/* .player-controls {
    display: flex;
} */

.player-controls audio {
    width: 100%;
    background-color: transparent;
}

audio::-webkit-media-controls-panel,
video::-webkit-media-controls-panel {
    background-color: white;
}

.play-button,
.pause-button,
.volume-button {
    border: none;
    background-color: transparent;
    color: #333;
    font-size: 24px;
    cursor: pointer;
    margin-right: 10px;
}

.progress-bar {
    width: 100%;
    height: 3px;
    background-color: #ccc;
    position: relative;
    margin: 0 10px;
}

.progress {
    width: 0%;
    height: 100%;
    background-color: #f00;
    position: absolute;
    top: 0;
    left: 0;
}

.current-time,
.duration {
    font-size: 14px;
    color: #999;
    margin: 0;
}

.item-music {
    display: flex;
}

</style>

<script>
import $ from "jquery";
import Activity from "../CommentComponent/Activity.vue";

export default {
    setup() { },
    props: {
        MusicDetail: Object,
    },
    watch: {
        MusicDetail: function (newVal, oldVal) {
            console.log(newVal);
        }
    },
    components: {
        Activity
    },
    mounted() {

        var VueThis = this;
        $("#post_" + VueThis.MusicDetail.id + " .more-desc").click(function () {
            $(this).next().show();
            $(this).hide();
            $("#post_" + VueThis.MusicDetail.id + " .hide-desc").show();
        });

        $("#post_" + VueThis.MusicDetail.id + " .hide-desc").click(function () {
            $(this).prev().hide();
            $(this).hide();
            $(this).parent().find("#post_" + VueThis.MusicDetail.id + " .more-desc").show();
            $("#post_" + VueThis.MusicDetail.id + " .more-desc").show()
        });

        var observer = new IntersectionObserver(
            function (entries, observer) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        $(entry.target).find("audio")[0].play();
                    } else {
                        $(entry.target).find("audio")[0].pause();
                    }
                });
            },
            { threshold: 0, rootMargin: "-350px 0px" }
        );
        observer.observe(
            $("[data-music='" + this.MusicDetail.music.song_file + "']")[0]
        );
    },
};
</script>
