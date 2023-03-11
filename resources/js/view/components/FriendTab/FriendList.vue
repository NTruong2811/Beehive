<template>
    <div id="Friend_List">
        <loading v-model:active="isLoading" :is-full-page="fullPage" />
        <div class="item" v-for="item in Friends" :key="item">
            <Card :item="item" :action="'View Profile'"></Card>
        </div>
    </div>
</template>
<style scoped>
#Friend_List {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 20px;
}
.item {
    padding: 5%;
}
</style>
<script>
import Loading from "vue-loading-overlay";
import { ListFriend } from "../../../services/Users";
import Card from "../friendsComponent/FriendCard.vue"
export default {
    setup() {},
    components: {
        Card,
        Loading,
    },
    data() {
        return {
            Friends: [],
            isLoading: false,
            fullPage: true,
        };
    },
    created() {
        this.GetFriendList();
    },
    methods: {
        async GetFriendList() {
            this.isLoading = true;
            const id = this.$route.query.id;
            this.Friends = await ListFriend(id)
                .then(function (res) {
                    const { data } = res;
                    return data;
                })
                .catch(function (err) {
                    console.log(err);
                });
            this.isLoading = false;
        },
    },
};
</script>
