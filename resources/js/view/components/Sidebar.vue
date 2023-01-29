<template>
    <div class="sidebar">
        <div class="friends">
            <h5>Friends</h5>
            <div class="list">
                <ul>
                    <li>
                        <img
                            class="avt"
                            src="https://yeuphaidep.com/wp-content/uploads/2022/05/he-nu-cuoi-khinh-bi.jpg"
                            alt=""
                        />
                        <div class="detail">
                            <span>duless</span>
                            <p class="status">
                                <i class="fa-solid fa-circle"></i> online
                            </p>
                        </div>
                    </li>
                    <li>
                        <img
                            class="avt"
                            src="https://yeuphaidep.com/wp-content/uploads/2022/05/he-nu-cuoi-khinh-bi.jpg"
                            alt=""
                        />
                        <div class="detail">
                            <span>duless</span>
                            <p class="status">an hour ago</p>
                        </div>
                    </li>
                    <li>
                        <img
                            class="avt"
                            src="https://yeuphaidep.com/wp-content/uploads/2022/05/he-nu-cuoi-khinh-bi.jpg"
                            alt=""
                        />
                        <div class="detail">
                            <span>duless</span>
                            <p class="status">an hour ago</p>
                        </div>
                    </li>
                    <li>
                        <img
                            class="avt"
                            src="https://yeuphaidep.com/wp-content/uploads/2022/05/he-nu-cuoi-khinh-bi.jpg"
                            alt=""
                        />
                        <div class="detail">
                            <span>duless</span>
                            <p class="status">an hour ago</p>
                        </div>
                    </li>
                    <li>
                        <img
                            class="avt"
                            src="https://yeuphaidep.com/wp-content/uploads/2022/05/he-nu-cuoi-khinh-bi.jpg"
                            alt=""
                        />
                        <div class="detail">
                            <span>duless</span>
                            <p class="status">an hour ago</p>
                        </div>
                    </li>
                    <li>
                        <img
                            class="avt"
                            src="https://yeuphaidep.com/wp-content/uploads/2022/05/he-nu-cuoi-khinh-bi.jpg"
                            alt=""
                        />
                        <div class="detail">
                            <span>duless</span>
                            <p class="status">an hour ago</p>
                        </div>
                    </li>
                    <li>
                        <img
                            class="avt"
                            src="https://yeuphaidep.com/wp-content/uploads/2022/05/he-nu-cuoi-khinh-bi.jpg"
                            alt=""
                        />
                        <div class="detail">
                            <span>duless</span>
                            <p class="status">an hour ago</p>
                        </div>
                    </li>
                    <li>
                        <img
                            class="avt"
                            src="https://yeuphaidep.com/wp-content/uploads/2022/05/he-nu-cuoi-khinh-bi.jpg"
                            alt=""
                        />
                        <div class="detail">
                            <span>duless</span>
                            <p class="status">an hour ago</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="hashtags">
            <h5>Hashtags</h5>
            <div class="list">
                <span
                    >#stay strong
                    <h6>100</h6></span
                >
                <span
                    >#kip moving
                    <h6>50</h6></span
                >
                <span>
                    #i am monster
                    <h6>7</h6></span
                >
            </div>
        </div>
    </div>
</template>
<style>
.sidebar {
    height: auto;
    padding: 50px 0px !important;
}
.friends {
    height: 50vh;
    background: rgba(85, 97, 226, 0.02);
    width: 80%;
    padding: 30px !important;
    border-radius: 20px;
}
.friends h5,
.hashtags h5 {
    width: 50px;
    border-bottom: 3px solid #8224e3;
}
.friends .list {
    max-height: 90%;
    overflow-y: auto;
    margin-top: 10px !important;
}
.friends .list ul {
    padding: 0px;
}
.friends .list ul li {
    display: flex;
    gap: 10px;
    margin: 5px 0px !important;
}
.friends .list ul li span {
    font-weight: 500;
}
.friends .list ul li i {
    color: #2ed573;
    font-size: 12px;
    margin: 0px 5px !important;
}
.friends .list ul li .status {
    color: #383a4591;
}
.friends .list img {
    width: 45px;
    height: 45px;
    border-radius: 100%;
}

.hashtags {
    margin-top: 20px !important;
    width: 80%;
}
.hashtags .list {
    display: flex;
    flex-wrap: wrap;
    margin-top: 10px !important;
}
.hashtags .list span {
    font-size: 13px;
    display: flex;
    gap: 5px;
    background-color: #f8f9fb;
    padding: 5px 10px !important;
    border-radius: 20px;
    margin: 5px !important;
    cursor: pointer;
}
</style>
