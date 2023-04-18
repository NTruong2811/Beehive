<template>
    <div class="activity">
        <div class="total_activity">
            <span><i class="fa-regular fa-thumbs-up"></i> 28</span>
            <div class="cmt_share">
                <span>5 comments</span>
                <span> 5 Shares</span>
            </div>
        </div>
        <div class="activity_action">
            <ul>
                <li v-if="!PostDetail.check_like" @click="LikeAction(false)"><i class="fa-regular fa-thumbs-up"></i> Like</li>
                <li v-else class="like_active" @click="LikeAction(true)"><i class="fa-regular fa-thumbs-up"></i> Like</li>
                <router-link :to="{
                    path: '/detail/'+ type_post,
                    query: {
                        id: PostDetail.id,
                    },
                }">
                    <li><i class="fa-regular fa-comment"></i> Comment</li>

                </router-link>
                <li> <i class="fa-regular fa-share-from-square"></i> Share </li>
            </ul>
        </div>
        <div class="comment">
            <img class="avt" :src="userInfor.avatar" alt="" />
            <input type="text" placeholder="Write some thing..." />
        </div>
        <div v-if="PostDetail.first_comment">
            <Comment :CommentDetail="PostDetail.first_comment"></Comment>
        </div>
    </div>
</template>

<style>
.total_like_comment {
    color: #6d6f72 !important;
}

.activity {
    margin: 15px 0px;
}

.activity .total_activity {
    display: flex;
    justify-content: space-between;
    font-size: 16px;
}

.activity .total_activity .fa-thumbs-up {
    color: #8224e3;
}

.activity .total_activity .cmt_share {
    display: flex;
    gap: 10px;
}
.activity  a{
    color: black !important;

}
.activity .activity_action {
    padding: 10px 0px;
    border-top: 1px solid #3e404217;
    border-bottom: 1px solid #3e404217;
    font-weight: 500;
}

.activity .activity_action ul {
    display: flex;
    padding: 0px !important;
    justify-content: space-between;
}

.activity .activity_action ul li {
    list-style: none;
    cursor: pointer;
}

.activity .activity_action .like_active {
    color: #8224e3;
}

.activity .comment {
    display: flex;
    margin: 20px 0px;
    align-items: center;
}

.activity .comment .avt {
    width: 45px;
    height: 45px;
}

.activity .comment input {
    margin-left: 10px;
    width: 100%;
    border: 0px;
    outline: none;
    border: 1px solid;
    border-color: #e7edf277;
    border-radius: 20px;
    padding: 0px 2%;
    font-size: 13px;
    height: 45px;
    margin-top: 5px;
}

#rep-buton {
    display: none !important;
}
</style>

<script>
import $ from "jquery";
import Comment from "../CommentComponent/Comment.vue";
import { UpdateLike } from "../../../services/Post";
export default {
    setup() { },
    data() {
        return {
            type_post: '',
        }
    },
    props: {
        PostDetail: Object,
    },
    watch: {
        PostDetail: function (newVal, oldVal) {
            console.log(newVal);
        }
    },
    components: {
        Comment
    },
    mounted() {
        if (this.PostDetail.type_postId == 1) {

        }
        else if (this.PostDetail.type_postId == 2) {
            this.type_post = 'video'
        }
        else if (this.PostDetail.type_postId == 3) {
            this.type_post = 'music'
        }
    },
    methods:{
        LikeAction(status){
           var data ={
             post_id:this.PostDetail.id,
             user_id: this.userInfor.id,
             status:status
           }
           UpdateLike(data).then((res)=>{
            console.log(res);
           }).catch((e)=>{
            console.log(e.request.response);
           })
        }
    }
};
</script>
