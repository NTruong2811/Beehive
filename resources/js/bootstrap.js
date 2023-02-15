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
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: "c90e7ea1b65b0437af7e",
    cluster: "ap1",
    forceTLS: true,
});

let user = JSON.parse(localStorage.getItem("user"));
localStorage.setItem("notification", { NewFriend: 0 });
if (user != null) {
    let channel = window.Echo.channel("channel-AddFriend" + user.id);
    channel.listen("AddFriendEvent", function (e) {
        $(document).ready(function () {
            toastr.success('Have fun storming the castle!', 'Miracle Max Says')

            //     $(".fa-users")
            //         .closest("li")
            //         .append(
            //             `
            //     <div
            //      class="nofification"
            //      style="
            //          position: absolute;
            //          right: -4px;
            //          top: -4px;
            //          padding: 0% 10%;
            //          background-color: #e41e3f;
            //          border-radius: 100%;
            //          color: white;
            //     ">
            //     ` +
            //                 1 +
            //                 `
            //  </div>`
            //         );
        });
        // alert("You have a friend request from " + e.FromUser);
    });
}
