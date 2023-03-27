<template>
    <div class="beehive">
        <div class="d-none d-lg-block" style="width: 80px; z-index: 9999">
            <Navbar></Navbar>
        </div>
        <div
            class="container-fluid"
            style="padding: 0px !important; position: relative; width: 100%"
        >
            <Headmain></Headmain>
            <div class="container">
                <div class="row beehive-content">
                    <div class="col-md-9 col-sm-12">
                        <div class="beehive-main">
                            <FormLayout></FormLayout>
                            <router-view></router-view>
                        </div>
                    </div>
                    <div
                        class="col-3 beehive-sidebar d-none d-lg-block"
                        style="height: 100vh"
                    >
                        <Sidebar></Sidebar>
                    </div>
                    <div class="chatList">
                        <!-- <Chat></Chat> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
.beehive {
    display: grid;
    grid-template-columns: 80px 1fr;
}
@media (max-width: 576px) {
    .beehive {
        display: unset;
    }
    .beehive-main {
        width: 100%;
        padding: 5% !important;
    }
}

.beehive-main {
    /* margin-top: 8vh; */
    padding: 10% 10% 5% 10%;
    height: 100vh;
    overflow-y: scroll;
    overflow-x: hidden;
}
.beehive-content {
    width: 100%;
}
</style>
<script>
import Navbar from "../components/Navbar.vue";
import Headmain from "../components/Head.vue";
import Sidebar from "../components/Sidebar.vue";
import FormLayout from "../components/FormLayout.vue";
import Chat from "../components/Chat.vue";
import $ from "jquery";

export default {
    setup() {},
    components: {
        Navbar,
        Headmain,
        Sidebar,
        FormLayout,
        Chat,
    },
    mounted() {
        const scroller = document.querySelector(".beehive-main");

        scroller.addEventListener("scroll", (event) => {
            if (scroller.scrollTop > 150) {
                $(".head").css("height", "60px");
                $(".search-result").css("top", "60px");
            } else {
                $(".head").css("height", "80px");
                $(".search-result").css("top", "80px");
            }
        });
    },
};
</script>
