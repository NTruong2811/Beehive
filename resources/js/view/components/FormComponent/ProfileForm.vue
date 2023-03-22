<template>
    <div class="post">
        <div class="write">
            <img class="avt" :src="user.avatar" alt="" />
            <textarea
                placeholder="What's new, NTruong?"
                name="description"
                id=""
                cols="30"
                rows="5"
                autofocus
            ></textarea>
        </div>
        <div class="additional">
            <div class="file">
                <label class="custom-file-upload">
                    <input type="file" name="files" />
                    <i class="fa-solid fa-file"></i>
                    <span id="files">files</span>
                </label>
            </div>
        </div>
    </div>
</template>
<style scoped>
.avt {
    border-radius: 100%;
}
.write {
    display: flex;
    border-bottom: 1px solid;
    border-color: #e7edf2;
}
textarea {
    width: 100%;
    border: 0px;
    margin-left: 10px;
    outline: none;
    resize: none;
    padding: 0px 2%;
    font-size: 13px;
}
.file {
    color: #4f5261bb;
}
.custom-file-upload {
    display: inline-block;
    font-size: 16px;
    font-weight: bold;
    padding: 10px;
    cursor: pointer;
}

.custom-file-upload input[type="file"] {
    display: none;
}

.custom-file-upload i {
    margin-right: 5px;
}
.music_infor input {
    margin: 10px;
    outline: none;
    border: 0px;
    border-bottom: 1px solid;
    border-color: #e7edf2;
    font-size: 13px;
}
</style>
<script>
export default {
    props: {
        user: Object,
    },
    setup() {},
    mounted() {
        this.FileName("files");
    },
};
</script>
