<template>
    <div class="container-fluid row">
        <div class="col-3 relative">
            <Navbar></Navbar>
        </div>
        <div class="col-9">
            <Headmain></Headmain>
            <div class="row">
                <div class="col-8">
                    <div class="main">
                        <Forms></Forms>
                        <TabContents></TabContents>
                        <router-view></router-view>
                    </div>
                </div>
                <div class="col-4" style="height: 100vh;">
                    <Sidebar></Sidebar>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
.main {
    padding: 5%;
    height: 100vh;
    overflow-y: scroll;
}
</style>
<script>
import Navbar from "../components/Navbar.vue";
import Headmain from "../components/Head.vue";
import Sidebar from "../components/Sidebar.vue";
import Forms from "../components/Forms.vue";
import TabContents from "../components/TabContents.vue";

export default {
    setup() {},
    components: {
        Navbar,
        Headmain,
        Sidebar,
        Forms,
        TabContents,
    },
};
</script>
