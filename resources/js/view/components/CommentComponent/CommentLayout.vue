<template>
    <div class="comments">
        <div class="content" id="content">
            <ul class="main-comment">
                <li>
                    <comment></comment>
                </li>
            </ul>
        </div>
        <form class="post-comment" @submit.prevent="UpdateCmt">
            <input type="text" placeholder="Write some thing..." name="comment" />
            <button type="submit">
                <i class="fa-solid fa-paper-plane"></i>
            </button>
        </form>
    </div>
</template>
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
<script>
import $ from "jquery";
import comment from "./comment";
export default {
    setup() {},
    components: {
        comment,
    },
    mounted() {
        console.log($(".comments #content"));
    },
    methods:{
      UpdateCmt(e){
          this.$emit('UpdateCmt',e.target.comment.value)
      }
    }
};
</script>
