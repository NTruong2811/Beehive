<template>
    <div class="forms">
        <div class="post-new">
            <form
                action=""
                method="post"
                @submit.prevent="PostNew"
                id="PostNew"
            >
                <div class="show">
                    <img class="avt" :src="user.avatar" alt="" />
                    <input type="text" placeholder="What's new, NTruong?" />
                </div>
                <div class="content">
                    <div class="post_type">
                        <PostFrom
                            v-if="CurrentType == 1"
                            :user="user"
                        ></PostFrom>
                        <MucsicForm
                            v-if="CurrentType == 3"
                            :user="user"
                        ></MucsicForm>
                        <VideoForm
                            v-if="CurrentType == 2"
                            :user="user"
                        ></VideoForm>
                    </div>
                    <div class="choise">
                        <select name="type_post" id="" @change="ChangeType">
                            <option
                                v-for="item in ListTypePost"
                                :key="item"
                                :value="item.id"
                            >
                                Post in: {{ item.name }}
                            </option>
                        </select>
                        <div class="button">
                            <span class="cancel">Cancel</span>
                            <button type="submit">Post Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<style>
.forms .post-new img {
    width: 50px;
    height: 50px;
}
.avt {
    border-radius: 100%;
}
.forms .post-new form {
    width: 100%;
    background-color: white;
    padding: 5%;
    border-radius: 20px;
}
.forms .post-new form::placeholder {
}
.forms .post-new form .show {
    display: flex;
}
.forms .post-new form .content {
    display: none;
}
.forms .post-new form .show input {
    margin-left: 10px;
    width: 100%;
    border: 0px;
    outline: none;
    border: 1px solid;
    border-color: #e7edf277;
    border-radius: 20px;
    padding: 0px 2%;
    font-size: 13px;
    height: 40px;
    margin-top: 5px;
}
.forms .post-new form .choise {
    margin-top: 2%;
    display: flex;
    justify-content: space-between;
    flex-wrap: nowrap;
}
.forms .post-new form .choise select {
    border: 1px solid #e7edf2;
    padding: 1% 5% 1% 2%;
    border-radius: 20px;
    outline: none;
    font-size: 14px;
    font-weight: 100;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16px' height='16px' viewBox='0 0 24 24' fill='none'%3E%3Cpath d='M6.1018 8C5.02785 8 4.45387 9.2649 5.16108 10.0731L10.6829 16.3838C11.3801 17.1806 12.6197 17.1806 13.3169 16.3838L18.8388 10.0731C19.5459 9.2649 18.972 8 17.898 8H6.1018Z' fill='%23212121'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 0.5rem center;
}
select::-ms-expand {
    display: none;
}
.forms .post-new form .choise .button {
    width: 50%;
    text-align: right;
}
.forms .post-new form .choise span {
    color: #8224e3;
    font-size: 13px;
    cursor: pointer;
    margin: 0px 4%;
}
.forms .post-new form .choise button {
    background-image: linear-gradient(
        90deg,
        #8224e3 0,
        #a968ec 50%,
        #8224e3 100%
    );
    border: 0px;
    box-shadow: 0 1px 2px 0 rgb(130 36 227 / 50%);
    color: white;
    font-size: 12px;
    outline: none;
    padding: 2% 10%;
    border-radius: 20px;
}
</style>

<script>
import $ from "jquery";
import { GetTypePost, UpdatePost } from "../../services/Post";
import PostFrom from "./FormComponent/PostForm.vue";
import MucsicForm from "./FormComponent/MusicForm.vue";
import VideoForm from "./FormComponent/VideoForm.vue";
import emitter from "../../services/changeData";
export default {
    components: {
        PostFrom,
        MucsicForm,
        VideoForm,
    },
    setup() {},
    data() {
        return {
            user: this.userInfor,
            ListTypePost: null,
            CurrentType: 1,
        };
    },
    created() {
        this.TypePost();
    },
    methods: {
        async TypePost() {
            this.ListTypePost = await GetTypePost().then(function (res) {
                const { data } = res.data;
                return data;
            });
        },
        ChangeType(e) {
            this.CurrentType = e.target.value;
        },
        PostNew(e) {
            const formData = new FormData();
            if (this.CurrentType == 3) {
                const song_file = this.LoadFile(e.target.song_file.files[0], 2);
                const image_file = this.LoadFile(
                    e.target.song_image.files[0],
                    1
                );
                formData.append("user_id", this.userInfor.id);
                formData.append("type_postId", this.CurrentType);
                formData.append("description", e.target.description.value);
                formData.append("song_name", e.target.song_name.value);
                formData.append("song_artist", e.target.song_artist.value);
                formData.append("song_file", song_file);
                formData.append("image_file", image_file);
            } else if (this.CurrentType == 2) {
                const video_file = this.LoadFile(
                    e.target.video_file.files[0],
                    3
                );
                formData.append("user_id", this.userInfor.id);
                formData.append("type_postId", this.CurrentType);
                formData.append("description", e.target.description.value);
                formData.append("video_file", video_file);
            }
            UpdatePost(formData)
                .then(function (res) {
                    emitter.emit("update", res.data);
                })
                .catch((err) => {
                    // console.log(err.request.response);
                });
            $("#PostNew")[0].reset();
        },
        ValidateForm() {
            let isValid = 0;
            $(".post_type input").each(function () {
                if ($(this).val().length == 0) {
                    isValid += 1;
                }
            });
            return isValid;
        },
    },
    mounted() {
        $(".forms .show input").click(function () {
            $(".forms .content").show();
            $(".forms .show").hide();
            $(".forms .content").find("textarea").focus();
        });
        $(".cancel").click(function () {
            $(".forms .content").hide();
            $(".forms .show").show();
        });
    },
};
</script>
