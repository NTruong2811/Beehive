<template>
    <div class="navbar">
        <div class="infor">
            <div class="avt">
                <img
                    src="https://yeuphaidep.com/wp-content/uploads/2022/05/he-nu-cuoi-khinh-bi.jpg"
                    alt=""
                />
            </div>
            <h4>NTruong</h4>
            <p><i class="fa-solid fa-circle"></i> Online</p>
            <div class="line"></div>
            <ul>
                <li><span>0</span> <br />Frends</li>
                <li><span>0</span> <br />Posts</li>
            </ul>
        </div>
        <div class="panel-top">
            <div class="logo">
                <img src="images/logo.svg" alt="" />
            </div>
        </div>
        <div class="panel-bot">
            <ul>
                <li class="active">
                    <i class="fa-solid fa-book"></i> <br />
                    NewFeeds
                </li>
                <li><i class="fa-regular fa-image"></i> <br />Photos</li>
                <li><i class="fa-solid fa-play"></i> <br />Watch</li>
                <li><i class="fa-solid fa-users"></i> <br />People</li>
                <li><i class="fa-solid fa-bag-shopping"></i> <br />Shop</li>
                <li>
                    <i class="fa-solid fa-newspaper"></i> <br />
                    Blog
                </li>
            </ul>
        </div>
    </div>
</template>
<style scoped>
.navbar .infor {
    position: absolute;
    background-color: white;
    width: 80%;
    height: 320px;
    border-radius: 20px;
    /* text-align: center; */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.navbar .infor .line {
    height: 2px;
    width: 80%;
    background-color: #4f52611c;
    margin: 20px 0px !important;
}
.navbar .infor ul {
    display: flex;
    text-align: center;
    padding: 0px !important;
}
.navbar .infor ul li {
    list-style: none;
    margin: 0px 10px !important;
    font-size: 18px;
    color: #4f5261bb;
}
.navbar .infor ul li span {
    color: #383a45;
}
.navbar .infor .avt {
    width: 100px;
    height: 100px;
    overflow: hidden;
    border-radius: 100%;

    margin-bottom: 10px !important;
    border: 2px solid #4f52611c;
    padding: 5px !important;
    cursor: pointer;
}
.navbar .infor .avt img {
    width: 100%;
    height: 100%;
    border-radius: 100%;
}
.navbar .infor p {
    color: #2ed573;
    display: flex;
    align-items: center;
    flex-wrap: 5px;
}
.navbar .infor .fa-circle {
    font-size: 12px;
    margin: 0px 5px !important;
}
.navbar {
    background-color: #f8f9fb;
    display: flex;
    justify-content: space-between;
    max-height: 100vh;
    overflow-y: auto;
    width: 100%;
    position: relative;
    padding-top: 0px !important;
}
.navbar .logo h3 {
    font-weight: 500 !important;
}
.navbar .panel-top {
    background-color: #383a45;
    background-image: linear-gradient(135deg, #4f5261 0%, #383a45 50%);
    width: 100%;
    text-align: center;
    height: 50vh;
}
.navbar .panel-top .logo {
    margin-top: 10% !important;
}
.panel-bot {
    background-color: #f8f9fb;
    width: 100%;
    height: 50vh;
    text-align: center;
    padding: 8% !important;
}
.panel-bot ul {
    padding-top: 150px !important;
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding-left: 0px !important;
}
.panel-bot ul li {
    padding: 0px !important;
    list-style: none;
    margin: 20px 0px !important;
    color: #4f5261bb !important;
    font-size: 18px;
    cursor: pointer;
}
.panel-bot ul .active {
    color: #8224e3 !important;
}
</style>
