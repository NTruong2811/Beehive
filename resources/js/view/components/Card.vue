<template>
    <div class="card" style="width: 18rem">
        <router-link
            class="tab"
            :to="{
                path: '/profile',
                query: { id: item.FriendInfor.id },
            }"
        >
            <div class="img card-img-top">
                <img
                    class="card-img-top"
                    :src="item.FriendInfor.avatar"
                    alt="Card image cap"
                />
            </div>
        </router-link>
        <div class="card-body">
            <h5 class="card-title">{{ item.FriendInfor.name }}</h5>
            <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
            </p>
            <span
                v-if="action == 'Accept'"
                href="#"
                class="btn btn-primary"
                @click="AcceptFriend(item.id)"
                >{{ action }}</span
            >
            <span
                v-if="action == 'View Profile'"
                href="#"
                class="btn btn-primary"
                >{{ action }}</span
            >
        </div>
    </div>
</template>
<style scoped>
.card {
    border: 0px !important;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    color: black;
}
.card-text {
    color: #4f52619d;
}
</style>
<script>
import { AcceptFriend } from "../../services/Users";
export default {
    setup() {},
    props: {
        item: Object,
        action: String,
    },
    methods: {
        AcceptFriend(id) {
            AcceptFriend(id).then(function (res) {
                console.log(res);
            });
        },
    },
};
</script>
