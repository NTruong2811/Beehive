import "./bootstrap";

import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";

import routes from "./routes";
import App from "./App.vue";
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";

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
});
