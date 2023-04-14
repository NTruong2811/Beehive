<template>
    <div class="beehive-navbar">
        <div class="logo">
            <router-link to="/">
                <img src="/images/logo.png" alt="" />
            </router-link>
        </div>
        <ul>
            <router-link to="/">
                <li class="">
                    <i class="fa-solid fa-signs-post"></i>
                </li>
            </router-link>
            <li>
                <i class="fa-solid fa-newspaper"></i>
            </li>
            <router-link :to="{
                path: '/friendships',
                query: { id: this.UserInfor.id },
            }">
                <li>
                    <i class="fa-solid fa-users"></i>
                </li>
            </router-link>
            <li><i class="fa-solid fa-shop"></i></li>
            <router-link to="/watch">
                <li>
                    <i class="fa-solid fa-forward-step"></i>
                </li>
            </router-link>
        </ul>
        <div class="user">
            <div class="logout">
                <i class="fa-solid fa-right-from-bracket"></i>
            </div>
            <router-link :to="{
                path: '/profile',
                query: { id: this.userInfor.id }
            }">
                <div class="avt">
                    <img :src="this.UserInfor.avatar" alt="" />
                </div>
            </router-link>
        </div>
    </div>
</template>
<style scoped>
a {
    color: #4f5261bb;
}

.beehive-navbar {
    position: relative;
    width: inherit;
    height: 100vh;
    position: fixed;
    background-color: #f8f9fb;
    border-right: 1px solid #4f52611c;
    display: flex;
    flex-direction: column;
    padding: 0px !important;
    gap: 50px;
}

.beehive-navbar .logo {
    width: 100%;
    height: 80px;
    padding: 10%;
    background-color: #383a45;
    background-image: linear-gradient(135deg, #4f5261 0%, #383a45 50%);
}

.beehive-navbar .logo img {
    width: 100%;
}

.beehive-navbar ul {
    display: flex;
    flex-direction: column;
    gap: 25px;
    width: 100% !important;
    padding: 0px !important;

    align-items: center;
}

.beehive-navbar ul li {
    list-style: none;
    color: #4f5261bb;
    font-size: 16px;
    cursor: pointer;
    width: 55px;
    height: 55px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
    position: relative;
}

.beehive-navbar ul li i {
    margin: auto;
}

.logout {
    text-align: center;
    /* height: 50px;
    width: 50px; */
    font-size: 18px;
    width: 100%;
    border-radius: 100%;
    color: #4f5261bb;
    margin: 10px 0px;
    /* background-color: ; */
    cursor: pointer;
}

.user {
    padding: 15%;
    position: absolute;
    bottom: 0px;
}

.user .avt {
    width: 100%;
    /* margin: 15%; */
    border: 1px solid #4f5261;
    border-radius: 100%;
    padding: 5%;
}

.user .avt img {
    width: 100%;
    border-radius: 100%;
}

ul .active {
    background: linear-gradient(135deg, #c395f1 0%, #8224e3 75%);
    color: #fff !important;
    display: flex;
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px,
        rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
}

ul .active a {
    color: white;
}

ul .active i {
    margin: auto;
    font-size: 22px;
}
</style>
<script>
import $ from "jquery";
export default {
    setup() { },
    data() {
        return {
            UserInfor: JSON.parse(localStorage.getItem("user")),
        };
    },
    mounted() {
        var nav = $(".beehive-navbar ul li");
        var url = location.pathname;

        if (url == "/") {
            nav[0].classList.add("active");
        }

        for (let index = 0; index < nav.length; index++) {
            if (nav[index].closest("a") != null) {
                let el = nav[index].closest("a").getAttribute("href");
                if (url == el) {
                    nav[index].classList.add("active");
                }
            }
        }
        nav.click(function () {
            for (let index = 0; index < nav.length; index++) {
                nav[index].classList.remove("active");
            }
            $(this).addClass("active");
        });

        $(".logout").click(() => {
            localStorage.clear();
            this.$router.push("/login");
        });
    },
};
</script>
