<template>
    <div id="NewFriend">
        <loading v-model:active="isLoading" :is-full-page="fullPage" />
        <div class="item" v-for="item in Friends" :key="item">
            <Card :item="item" :action="'Accept'"></Card>
        </div>
    </div>
</template>
<style scoped>
#NewFriend {
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
import { NewFriend } from "../../../services/Users";
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
        this.GetNewFriend();
    },
    methods: {
        async GetNewFriend() {
            this.isLoading = true;
            const id = this.$route.query.id;
            this.Friends = await NewFriend(id)
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
