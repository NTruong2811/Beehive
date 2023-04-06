<template>
    <div class="register">
        <div class="overlay"></div>
        <form action="" method="post" id="register">
            <div class="title">
                <p>Create An Account</p>
                <img src="images/logo.svg" alt="" /> <br />
                <p id="sub_title">What's your email?</p>
            </div>

            <swiper
                :pagination="{
                    type: 'progressbar',
                }"
                :cssMode="true"
                :navigation="true"
                :modules="modules"
                class="formRegister"
            >
                <swiper-slide>
                    <div class="input" style="">
                        <div class="field">
                            <input
                                type="search"
                                placeholder="Your email"
                                name="email"
                            />
                            <div class="true_icon">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <!-- <div class="error_icon">
                                <i class="fa-solid fa-circle-exclamation"></i>
                            </div> -->
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="input">
                        <div class="field">
                            <input
                                type="search"
                                placeholder="Name"
                                name="name"
                            /><i class="fa-solid fa-user"></i>
                        </div>
                        <div class="field">
                            <input type="date" id="date" name="birthday" />
                        </div>
                        <div class="field genders">
                            <span>Gender</span>:
                            <div class="gender">
                                Male
                                <input
                                    type="radio"
                                    value="0"
                                    name="gender"
                                    id=""
                                />
                            </div>
                            |
                            <div class="gender">
                                Famale
                                <input
                                    type="radio"
                                    value="1"
                                    name="gender"
                                    id=""
                                />
                            </div>
                        </div></div
                ></swiper-slide>
                <swiper-slide>
                    <div class="input">
                        <div class="field">
                            <input
                                type="password"
                                placeholder="Password"
                                autocomplete="new-password"
                                name="password"
                            /><i class="fa-solid fa-key"></i>
                        </div>
                        <div class="field">
                            <input
                                type="password"
                                placeholder="Confirm Password"
                                name="cf_password"
                            /><i class="fa-solid fa-key"></i>
                        </div></div
                ></swiper-slide>
            </swiper>

            <button type="button" id="submit">
                <i class="fa-solid fa-right-long"></i>
            </button>
            <br />
            <router-link to="/login">
                <span id="register">Already have an account?</span></router-link
            >
        </form>
    </div>
</template>
<style scoped>
.genders {
    margin: 20px 0px !important;
    font-weight: 20px !important;
}
.gender {
    display: flex;
    gap: 5px;
    margin: 0px 10px;
}
.gender input {
    width: 18px !important;
    height: 18px !important;
    cursor: pointer;
}
.error_icon i {
    color: red !important;
}
/* .true_icon i {
    display: none;
} */
.swiper-button-next,
.swiper-button-prev {
    display: none;
}
.flexRadioDefault {
    cursor: pointer;
    width: 15px !important;
    height: 15px !important;
    padding: 0px !important;
}
#date {
    padding: 25px !important;
}
.fa-right-long {
    font-size: 25px;
}
.register {
    width: 100vw;
    height: 100vh;
    background-image: url("/images/login_bg.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
}
.register .overlay {
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
    margin: 20px 0px;
    height: 100%;
}
form .fa-circle-exclamation {
    position: absolute;
    right: 0px;
}
form .input .field {
    display: flex;
    position: relative;
    width: 100%;
    margin: auto;
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
    margin: 0px 0px;
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
import { Swiper, SwiperSlide } from "swiper/vue";

import "swiper/css";

import "swiper/css/pagination";
import "swiper/css/navigation";
import { Pagination, Navigation } from "swiper";

import $ from "jquery";
import { validate } from "jquery-validation";
import axios from "axios";
export default {
    components: {
        Swiper,
        SwiperSlide,
    },
    setup() {
        return {
            modules: [Pagination, Navigation],
        };
    },
    mounted() {
        $(".swiper-button-prev").hide();
        $(".swiper-button-next").hide();
        var tab = 1;
        var formData = {};
        var navigate = this.$router;

        function status_validate(message, status) {
            $("#sub_title").text(message);
            if (status == 1) {
                $("#sub_title").css("color", "white");
            } else {
                $("#sub_title").css("color", "red");
            }
        }

        $("#submit").click(function (e) {
            if (tab == 1) {
                var email = $('input[name="email"]').val();
                if (
                    email.match(
                        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    )
                ) {
                    formData["email"] = email;
                    axios
                        .post("/api/check_email", formData)
                        .then(function (res) {
                            var { data } = res;
                            if (data.status == 1) {
                                status_validate(data.message, 2);
                            } else {
                                status_validate(
                                    "We need your information !",
                                    1
                                );
                                $(".swiper-button-next").trigger("click");
                                tab += 1;
                            }
                        });
                } else {
                    status_validate("Email is not correct!", 2);
                }
            } else {
                if (tab == 3) {
                    var password = $('input[name="password"]').val();
                    var cf_password = $('input[name="cf_password"]').val();
                    if (password != "" && cf_password != "") {
                        if (password === cf_password) {
                            formData["password"] = password;
                            formData["cf_password"] = cf_password;
                            axios
                                .post("/api/register", formData)
                                .then(function (res) {
                                    var { data } = res;
                                    if (data.status == 0) {
                                        status_validate(data.message, 1);
                                        navigate.push("/login");
                                    } else {
                                        status_validate(
                                            "We missing something ?",
                                            2
                                        );
                                    }
                                });
                        } else {
                            status_validate("Password does not match", 2);
                        }
                    } else {
                        status_validate("We missing something ?", 2);
                    }
                }
                if (tab == 2) {
                    var name = $('input[name="name"]').val();
                    var birthday = $('input[name="birthday"]').val();
                    var gender = $('input[name="gender"]:checked').val();
                    if (name != "" && birthday != "" && gender != undefined) {
                        formData["name"] = name;
                        formData["birthday"] = birthday;
                        formData["gender"] = gender;
                        status_validate("Come on just one more step !", 1);

                        $(".swiper-button-next").trigger("click");
                        tab += 1;
                    } else {
                        status_validate("We missing something ?", 2);
                    }
                }
            }
        });
    },
};
</script>
