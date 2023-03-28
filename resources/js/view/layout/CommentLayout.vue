<template>
    <div class="comments">
        <div class="content" id="content">
            <ul class="main-comment">
                <li v-for="item in Comments" :key="item">
                    <comment
                        @reply="Reply"
                        :CommentDetail="item"
                        :key="Reset"
                    ></comment>
                </li>
                <li v-if="Comments.length != total_comment">
                    <div class="rep">
                        <span id="view-more">
                            <div @click="ViewMoreComment">
                                {{ Comments.length }}View more{{
                                    total_comment
                                }}
                            </div>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
        <form class="post-comment" @submit.prevent="CommentAction">
            <div v-if="ReplyDetail.user" class="reply_comment">
                <i @click="CloseReply" class="fa-solid fa-xmark"></i>
                <div class="name">
                    {{ ReplyDetail.user.name }}
                </div>
            </div>
            <input
                type="text"
                autocomplete="off"
                placeholder="Write some thing..."
                name="comment"
                required
            />
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
    margin: 10px 0px;
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
    padding: 0px 10px;
}
.post-comment i {
    margin: 2px 5px 0px 0px;
}
.reply_comment {
    background-color: #e7edf277;
    height: 40px;
    font-size: 13px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: 500;
    cursor: pointer;
    padding-left: 20px;
}

.post-comment input {
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
.rep {
    margin: 0px 0px;
    font-weight: 500;
    cursor: pointer;
    text-decoration: underline;
}
</style>
<script>
import $ from "jquery";
import comment from "../components/CommentComponent/Comment.vue";
import { GetComment, UpdateComment, AddReply } from "../../services/Comment";
import emitter from "../../services/changeData";
export default {
    setup() {},
    data() {
        return {
            Comments: [],
            ReplyDetail: {},
            Reset: 0,
            more_comments: null,
            total_comment: null,
        };
    },
    components: {
        comment,
    },
    props: {
        PostId: Number,
    },
    watch: {
        PostId: function (newVal, oldVal) {
            GetComment(newVal).then((res) => {
                this.Comments = res.data.data;
                this.more_comments = res.data.current_page + 1;
                this.total_comment = res.data.total;
            });
        },
    },
    methods: {
        ViewMoreComment() {
            GetComment(this.PostId, this.more_comments).then((res) => {
                this.Comments.push(...res.data.data);
                this.more_comments = res.data.current_page + 1;
            });
        },
        CommentAction(e) {
            let content = e.target.comment.value;
            let reply_comment = $(".reply_comment .name").text();

            let data = {
                user_id: this.userInfor.id,
                like: 0,
                content: content,
            };

            if (reply_comment) {
                console.log(this.ReplyDetail);
                if (this.ReplyDetail.comment_id) {
                    // nếu ReplyDetail chứa comment_id tức đây là một reply có tiền hành reply cái reply đó
                    data.comment_id = this.ReplyDetail.comment_id;
                    data.parent_id = this.ReplyDetail.id;
                } else {
                    // nếu không mặc định đó là một comment và tiến hành reply comment đó
                    data.comment_id = this.ReplyDetail.id; // gans id của comment đó vào reply comment id
                }
                AddReply(data).then((res) => {
                    // chuyền reply comment vừa gửi sang comment chính
                    emitter.emit(`NewReply${res.data.comment_id}`, res.data);
                });
            } else {
                data.post_id = this.PostId;
                this.UpdateCmt(data);
            }
            this.total_comment += 1;
            e.target.comment.value = "";
        },
        UpdateCmt(data) {
            UpdateComment(data).then((res) => {
                this.Comments.push(res.data);
            });
        },
        Reply(data) {
            // Gán đối tượng cần trả lòi cho biến replydetail
            this.ReplyDetail = data;
            $("input[name='comment']").focus();
        },
        CloseReply() {
            this.ReplyDetail = {};
        },
        ResetComponent() {
            this.Reset += 1;
        },
    },
};
</script>
