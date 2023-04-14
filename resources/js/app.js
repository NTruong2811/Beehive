import "./bootstrap";

import { createApp, reactive } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import routes from "./routes";
import App from "./App.vue";
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";

import VueToast from 'vue-toast-notification'
import 'vue-toast-notification/dist/theme-sugar.css'

import "./services/ActionServices/BeehiveCall";
import "./services/ActionServices/Chat";
import { GetTypeNotifi } from "./services/Notification";
import $ from "jquery";

const router = createRouter({
    history: createWebHistory(),
    routes,
});

const app = createApp(App);
const bus = reactive({ data: null });
app.use(VueToast)





// Global variable
app.config.globalProperties.userInfor = JSON.parse(
    localStorage.getItem("user")
);
// Global function
app.config.globalProperties.LoadFile = (file, type) => {
    // return file;

    // image 1, sound 2, video 3
    const SizeLimit = 5242880;
    const ImageTypeLimit = [
        "image/jpeg",
        "image/jpg",
        "image/png",
        "image/gif",
        "image/bmp",
        "image/svg",
    ];
    const SoundTypeLimit = [
        "audio/mp3",
        "audio/wav",
        "audio/ogg",
        "audio/aac",
        "audio/flac",
        "audio/mpeg",
    ];
    const VideoTypeLimit = [
        "video/mp4",
        "video/webm",
        "video/ogv",
        "video/avi",
        "video/mov",
    ];

    if (file.size < SizeLimit) {
        if (type == 1) {
            if (ImageTypeLimit.includes(file.type)) {
                return file;
            } else {
                app.config.globalProperties.$toast.warning
                ("Oh no, you image format is not supported. Please try again !", {duration: 2000})
                // app.config.globalProperties.$toast.warning
                // ("Oh no, only image files are supported for files uploads.Please try again ! <br> (We are very sorry and issue will be resolved soon)", {duration: 2000})
            }
        } else if (type == 2) {
            if (SoundTypeLimit.includes(file.type)) {
                return file;
            } else {
                app.config.globalProperties.$toast.warning
                ("Oh no, you sound format is not supported. Please try again !", {duration: 2000})
            }
        } else {
            if (VideoTypeLimit.includes(file.type)) {
                return file;
            } else {
                app.config.globalProperties.$toast.warning
                ("Oh no, you video format is not supported. Please try again !", {duration: 2000})
            }
        }
    } else {
        app.config.globalProperties.$toast.warning("Oh no, Maximum file size is 5mb. Please try again !", {duration: 2000})
    }
};


app.config.globalProperties.FileName = (FileElement) => {
    $("input[name=" + FileElement + "]").change(function () {
        $("#" + FileElement)[0].innerText = $(this)[0].files[0].name;
    });
};
app.config.globalProperties.ValidateForm = (form) => {
    let isValid = 0;
    $(form).find("input").each(function () {
        if ($(this).val().length == 0) {
            isValid += 1;
        }
    });
    $(form).find("textarea").each(function () {
        if ($(this).val().length == 0) {
            isValid += 1;
        }
    });
    if (isValid > 0) {
        app.config.globalProperties.$toast.warning("We missing something ?", {duration: 2000})
    }
    return isValid;
};


app.config.globalProperties.ConvertTime = (postTime) => {
    const now = new Date();

    // Giả sử thời điểm bài đăng là "2022-03-15T12:00:00"
    var postTime = new Date(postTime);

    // Tính thời gian giữa hai thời điểm dưới dạng số giây
    const diffSeconds = Math.floor((now - postTime) / 1000);

    // Chuyển số giây thành đơn vị thời gian phù hợp
    let diff;
    if (diffSeconds < 60) {
        diff = diffSeconds + " second";
    } else if (diffSeconds < 3600) {
        diff = Math.floor(diffSeconds / 60) + " minute";
    } else if (diffSeconds < 86400) {
        diff = Math.floor(diffSeconds / 3600) + " hour";
    } else {
        diff = Math.floor(diffSeconds / 86400) + " day";
    }
    return diff;
};






app.config.globalProperties.back = '/';







app.use(router);
app.mount("#app");

router.beforeEach((to, from, next) => {
    var token = localStorage.getItem("token");
    var form = from
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

    if (form.fullPath.search('detail')== -1) {
        app.config.globalProperties.backurl = form.fullPath
    }

    // GetTypeNotifi().then(function (res) {
    //     var { data } = res;
    //     data.map(function (item) {
    //         if (to.fullPath.search(item.page_url) != -1) {
    //             $("." + item.name)
    //                 .find(".nofification")
    //                 .remove();
    //         }
    //     });
    // });
});
