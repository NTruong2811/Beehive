<template>
    <div class="tabcontent">
        <ul>
            <li v-for="(item, index) in dataTab" :key="index">
                <router-link
                    :to="{
                        path: item.path,
                        query: { id: this.userInfor.id },
                    }"
                >
                    <div v-if="index == 0" class="">
                        {{ item.name }}
                    </div>
                    <div v-if="index != 0" class="">
                        {{ item.name }}
                    </div>
                </router-link>
            </li>
        </ul>
    </div>
</template>
<style scoped>
.tabcontent {
    margin: 50px 0px 30px 0px;
}
.tabcontent ul {
    display: flex;
    padding: 0px;
    /* border-bottom: 1px solid; */
    border-color: #0000000c;
}
.tabcontent ul li {
    list-style: none;
    padding: 0px 10px;
    cursor: pointer;
    color: black !important;
}
.tabcontent ul li a {
    color: black;
}
.router-link-exact-active {
    border-bottom: 1px solid #8224e3 !important;
    color: #8224e3 !important;
    font-weight: 600;
}
.router-link-exact-active div{
    border-bottom: 2px solid #8224e3;
}
</style>
<script>
import $ from "jquery";
export default {
    setup() {},
    props: {
        dataTab: Array,
    },
    mounted() {
      
    },
};
</script>
