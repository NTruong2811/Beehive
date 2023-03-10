const user = JSON.parse(localStorage.getItem("user")) || null;
if (user != null) {
    window.Echo.channel("channelchat" + user.id).listen(
        "ChatEvent",
        function (res) {
            console.log(res);
        }
    );
        
}
