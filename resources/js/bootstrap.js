import _ from "lodash";
window._ = _;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from "axios";
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from "laravel-echo";
import Pusher from "pusher-js";
import $ from "jquery";
import toastr from "toastr";

// import { Base64 } from "../../public/js/Global";
import { AddFriend, CheckNotifiUnread } from "./services/Notification";
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: "c90e7ea1b65b0437af7e",
    cluster: "ap1",
    forceTLS: true,
});

const user = JSON.parse(localStorage.getItem("user"));
let url = new URL(location.href);
let params = new URLSearchParams(url.search);

let IdUserCurentPage = params.get("id");

// -----------------------notification -----------------------

// status = 1
if (user != null && user.id == IdUserCurentPage) {
    let channel = window.Echo.channel("channel-AddFriend" + user.id);
    channel.listen("AddFriendEvent", function (e) {
        let data = {
            message: e.FromUser + " sent you a friend request",
            ByUser: e.sendFrom,
            ToUser: e.sendTo,
            TypeNotifi: 1,
            status: 0,
        };
        AddFriend(data).then(function (res) {
            var { data } = res;
            var Base64Notifi = localStorage.getItem("notification");
            var LocalNotifi = JSON.parse(Base64.decode(Base64Notifi));
            console.log(LocalNotifi);
            LocalNotifi.map(function (item) {
                if (item.name == "AddFriend") {
                    item.data.push(data);
                    NotifiClient(item.name, item.data.length);
                }
            });
        });
    });

    CheckNotifiUnread(user.id).then(function (res) {
        const { data } = res;
        data.map(function (item) {
            if (item.data.length >= 1) {
                NotifiClient(item.name, item.data.length);
            }
        });
        localStorage.setItem(
            "notification",
            Base64.encode(JSON.stringify(data))
        );
    });
}

function NotifiClient(NameClass, NotiNumber) {
    $("." + NameClass).append(
        `
      <div
        class="nofification"
        style="
        font-size: 14px;
        position: absolute;
        right: -4px;
        top: -4px;
        padding: 0% 5%;
        background-color: #e41e3f;
        border-radius: 100%;
        color: white;
       ">
` +
            NotiNumber +
            `
</div>`
    );
}
