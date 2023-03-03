const user = JSON.parse(localStorage.getItem("user"));
// console.log(user);
window.Echo.channel("channelchat" + user.id).listen(
    "ChatEvent",
    function (res) {
        console.log(res);
    }
);
console.log(user);