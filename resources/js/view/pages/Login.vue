<template>
    <div class="login">
        <div class="overlay"></div>
        <form action="" method="post" id="login">
            <div class="title">
                <p>Welcome to</p>
                <img src="images/logo.svg" alt="" /> <br />
                <p id="sub_title">
                    Make friends, chat with people around the world, <br />
                    shopping and more...
                </p>
            </div>

            <div class="input" style="">
                <div class="field">
                    <input
                        type="search"
                        placeholder="Your email"
                        name="email"
                    /><i class="fa-solid fa-user"></i>
                </div>
                <div class="field">
                    <input
                        type="password"
                        placeholder="Password"
                        autocomplete="new-password"
                        name="password"
                    />
                    <i class="fa-solid fa-key"></i>
                </div>
            </div>
            <div class="remember_lostpass">
                <div class="remember">
                    <input type="checkbox" name="remember" id="remember" />
                    <label for="remember"> Remember</label>
                </div>
                <span> Lost Password? </span>
            </div>
            <button type="button" id="submit">Login into your account</button>
            <br />
            <router-link to="/register">
                <span id="register">Don't have account</span></router-link
            >
            <div class="panel-bot">
                <ul>
                    <li><i class="fa-regular fa-image"></i>Photos</li>
                    <li><i class="fa-solid fa-play"></i>Watch</li>
                    <li><i class="fa-solid fa-bag-shopping"></i> Shop</li>
                    <li>
                        <i class="fa-solid fa-newspaper"></i>
                        Blog
                    </li>
                </ul>
            </div>
        </form>
    </div>
</template>
<style scoped>
.login {
    width: 100vw;
    height: 100vh;
    background-image: url("/images/login_bg.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
}
.login .overlay {
    background-color: transparent;
    background-image: radial-gradient(
        at top center,
        rgba(0, 0, 0, 0.2) 0%,
        rgba(0, 0, 0, 0.9) 70%
    );
    opacity: 1;
    transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
    width: 100%;
    height: 100%;
    /* position: absolute; */
    z-index: 1;
}
form {
    z-index: 9999;
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    text-align: center;
    height: auto;
    width: 400px;
}
form .title p {
    font-weight: 600;
    font-size: 24px;
}
form .title img {
    width: 80px;
}
form .title #sub_title {
    padding: 20px 0px 10px 0px !important;
    font-size: 15px;
    font-weight: 400;
}
form .input {
    width: 100%;
    border-radius: 10px !important;
    overflow: hidden;
}
form .input .field {
    display: flex;
    position: relative;
    width: 100%;
}
form .input .field i {
    position: absolute;
    color: #626c72;
    z-index: 100%;
    right: 20px;
    top: 50%;
    transform: translate(-50%, -50%);
}
form .input input {
    width: 100%;
    height: 45px;
    font-size: 15px;
    padding: 0px 50px 0px 20px;
    border: 0px;
    outline: none;
}
form .remember_lostpass {
    display: flex;
    justify-content: space-between;
    padding: 10px 40px;
    font-size: 15px;
}
form .remember_lostpass label {
    margin-left: 10px;
}
form .remember_lostpass input {
    background-color: transparent;
}

form .remember_lostpass span {
    cursor: pointer;
}
form #submit {
    background-color: #8224e3;
    background-image: linear-gradient(
        90deg,
        #8224e3 0,
        #a968ec 50%,
        #8224e3 100%
    );
    box-shadow: 0 1px 2px 0 rgb(130 36 227 / 50%);
    color: #fff;
    border: 0px;
    font-size: 13px;
    outline: none;
    padding: 3% 15%;
    border-radius: 20px;
}
#register {
    font-size: 12px;
    font-weight: 600;
}
[type="search"]::-webkit-search-cancel-button,
[type="search"]::-webkit-search-decoration {
    -webkit-appearance: none;
    appearance: none;
}
.panel-bot {
    margin-top: 50px;
    width: 100%;
}
.panel-bot ul {
    padding: 0px;
    display: flex;
    text-align: center;
    gap: 20px;
    /* flex-wrap: wrap; */
}
.panel-bot ul li {
    list-style: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 55px;
    gap: 5px;
    border-radius: 50px;
    transition: 0.4s linear;
}
.panel-bot ul li i {
    background-color: #626c7242;
    width: 45px;
    height: 45px;
    line-height: 45px;
    border-radius: 100%;
}
</style>
<script>
import $ from "jquery";
import axios from "axios";
export default {
    setup() {},
    mounted() {
        var navigate = this.$router;

        $("#submit").click(function () {
            var formData = {
                password: $('input[name="password"]').val(),
                email: $('input[name="email"]').val(),
            };
            if (formData["password"] != "" && formData["email"] != "") {
                axios.post("/api/login", formData).then(function (res) {
                    var { data } = res;
                    if (data["status"] == 0) {
                        alert(data.message);
                        localStorage.setItem(
                            "user",
                            JSON.stringify(data["user"])
                        );
                        localStorage.setItem("token", data["token"]);
                        navigate.go("/");
                    } else {
                        alert(data.message);
                    }
                });
            } else {
                alert("We are missing something ?");
            }
        });
    },
};
</script>
