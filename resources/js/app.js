import "./bootstrap";

import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import routes from "./routes";
import App from "./App.vue";
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";

import "./services/ActionServices/BeehiveCall"
import "./services/ActionServices/Chat"
import { GetTypeNotifi } from "./services/Notification";
import $ from "jquery";

const router = createRouter({
    history: createWebHistory(),
    routes,
});

const app = createApp(App);

// Global variable
app.config.globalProperties.userInfor = JSON.parse(
    localStorage.getItem("user")
);

app.use(router);
app.mount("#app");

router.beforeEach((to, from, next) => {
    var token = localStorage.getItem("token");
    if (to.matched.some((record) => record.meta.AppProduct)) {
        if (token != null) {
            next();
        } else {
            next("/login");
        }
    }
    if (to.matched.some((record) => record.meta.Auth)) {
        if (token == null) {
            next();
        } else {
            next("/");
        }
    }
    GetTypeNotifi().then(function (res) {
        var { data } = res;
        data.map(function (item) {
            if (to.fullPath.search(item.page_url) != -1) {
                $("." + item.name)
                    .find(".nofification")
                    .remove();
            }
        });
    });
});
