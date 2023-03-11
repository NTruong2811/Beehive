<template>
    <div class="post">
        <div class="write">
            <img class="avt" :src="user.avatar" alt="" />
            <textarea
                placeholder="What's new, NTruong?"
                name=""
                id=""
                cols="30"
                rows="5"
                autofocus
            ></textarea>
        </div>
        <div class="additional">
            <!-- <i class="fa-solid fa-file"></i> <span></span> -->
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
</style>
<script>
export default {
    props: {
        user: Object,
    },
    setup() {},
};
</script>
