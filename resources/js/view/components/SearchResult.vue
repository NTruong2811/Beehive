<template>
    <div class="result_list">
        <div v-for="item in SearchResult" :key="item">
            <router-link
                :to="{
                    path: '/profile',
                    query: { id: item.id }
                }"
            >
                <div class="infor">
                    <div class="avt">
                        <img :src="item.avatar" alt="" />
                    </div>
                    <div class="meta">
                        <div class="post-by">
                            <span>
                                <strong>{{ item.name }}</strong></span
                            >
                            <br />
                            <span class="time">4 weeks ago</span>
                        </div>
                    </div>
                </div>
            </router-link>
        </div>
    </div>
</template>
<style scoped>
.search-result {
    position: absolute;
    top: 80px;
    background-color: #fbfafc;
    left: 0px;
    width: 100%;
    height: 70vh;
    transition: all 0.5s 0.1s;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    box-shadow: rgba(17, 17, 26, 0.295) 0px 1px 0px;
    padding: 4%;
    display: none;
    margin-bottom: 30px;
}
.meta {
    display: flex;
    font-size: 15px;
}
.meta strong {
    font-weight: 600;
}
.meta .time {
    font-size: 13px;
    color: rgba(0, 0, 0, 0.363);
}
.result_list {
    overflow-y: scroll;
    max-height: 100%;
}
.result_list .infor {
    display: flex;
    gap: 10px;
    margin: 5px 0px;
    cursor: pointer;
    margin: 10px 0px;
}
.result_list .avt img {
    width: 42px;
    height: 42px;
    border-radius: 100%;
    z-index: 100;
}
</style>
<script>
export default {
    setup() {
        return {};
    },
    props: {
        SearchResult: Array,
    },
    mounted() {
    
    },
};
</script>
