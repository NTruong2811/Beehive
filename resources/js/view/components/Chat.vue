<template>
    <div class="chat">
        <div class="windown">
            <div class="chat_head">
                <div class="infor">
                    <div class="avt">
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-L-UQBMvNKteW4niUJySPtT56ZREEObnrBXHmDAP86xTZX24eNiqFKwJg9tfSGVgpOSw&usqp=CAU"
                            alt=""
                        />
                    </div>
                    <div class="meta">
                        <div class="post-by">
                            <span> <strong>Irina Petrova</strong></span>
                            <br />
                            <span class="time">4 weeks ago</span>
                        </div>
                    </div>
                </div>
                <div class="action">
                    <ul>
                        <li>
                            <i class="fa-solid fa-phone"></i>
                        </li>
                        <li>
                            <i class="fa-solid fa-video"></i>
                        </li>
                        <li>
                            <i class="fa-solid fa-angle-down"></i>
                        </li>
                        <li class="close">
                            <i class="fa-solid fa-xmark"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="chat_content">
                <div class="line_chat">
                    <div class="avt">
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-L-UQBMvNKteW4niUJySPtT56ZREEObnrBXHmDAP86xTZX24eNiqFKwJg9tfSGVgpOSw&usqp=CAU"
                            alt=""
                        />
                    </div>
                    <div class="content">
                        <span>Hello</span>
                    </div>
                </div>
                <div class="line_chat">
                    <div class="avt">
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-L-UQBMvNKteW4niUJySPtT56ZREEObnrBXHmDAP86xTZX24eNiqFKwJg9tfSGVgpOSw&usqp=CAU"
                            alt=""
                        />
                    </div>
                    <div class="content">
                        <span
                            >Hello1111111111111111111111111111111111111111111111111111111</span
                        >
                    </div>
                </div>
                <div class="line_chat">
                    <div class="avt">
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-L-UQBMvNKteW4niUJySPtT56ZREEObnrBXHmDAP86xTZX24eNiqFKwJg9tfSGVgpOSw&usqp=CAU"
                            alt=""
                        />
                    </div>
                    <div class="content">
                        <span>Hello</span>
                    </div>
                </div>
            </div>
            <div class="action_sender">
                <form action="" method="post">
                    <input type="text" /><button>
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="list">
            <div class="infor">
                <div class="avt">
                    <img
                        style="width: 55px; height: 55px; border-radius: 100%"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-L-UQBMvNKteW4niUJySPtT56ZREEObnrBXHmDAP86xTZX24eNiqFKwJg9tfSGVgpOSw&usqp=CAU"
                        alt=""
                    />
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
.chat {
    position: fixed;
    right: 0px;
    bottom: 0px;
    display: flex;
}
.tabcontent ul {
    padding: 0px !important;
    margin: 0px !important;
}
.chat_head {
    padding: 3%;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;
    display: flex;
    justify-content: space-between;
}
.chat_head .action ul {
    display: flex;
    gap: 10px;
}
.chat_head .action ul li {
    list-style: none;
    font-size: 18px;
    cursor: pointer;
}
.chat_content {
    padding: 3%;
}
.chat_content .line_chat {
    display: flex;
    gap: 10px;
    margin: 10px 0px;
}
.chat_content .line_chat .content {
    background-color: #fbfafc;
    padding: 8px 10px 0px 10px;
    border-radius: 20px;
    height: auto;
    width: 80%;
}
.chat_content .line_chat .content span {
    /* line-height: 30px; */
    word-wrap: break-word;
}
.windown {
    width: 355px;
    height: 485px;
    /* position: fixed; */
    /* background-color: red; */
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px,
        rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;
    background-color: white;
    position: relative;
    /* padding: 3%; */
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    overflow: hidden;
}
.avt img {
    width: 42px;
    height: 42px;
    border-radius: 100%;
    z-index: 100;
}
.chat .list {
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    margin: 10px;
}
.chat .list .avt img {
    width: 55px;
    height: 55px;
}

.action_sender {
    position: absolute;
    bottom: 0px;
    height: 40px;
    /* background-color: red; */
    width: 100%;
    padding: 0px 3%;
}

.action_sender input {
    width: 100%;
    background-color: #fbfafc;
    border: 0px;
    outline: none;
    font-size: 16px;
    padding: 5px 10px;
    border-radius: 20px;
}
.action_sender form {
    display: flex;
    flex-wrap: nowrap;
}
.action_sender form button {
    background-color: transparent;
    border: 0px;
    outline: none;
}
.meta {
    display: flex;
    font-size: 15px;
}
.meta strong {
    font-weight: 600;
}
.meta .time {
    font-size: 13px;
    color: rgba(0, 0, 0, 0.363);
}
.infor {
    display: flex;
    gap: 10px;
    margin: 5px 0px;
    cursor: pointer;
}
</style>
<script>
import $ from "jquery";
export default {
    setup() {},
    mounted() {
        $(".chat .close").click(function () {
            $(".windown").hide();
            $(".chat .list").append(
                `
            <div class="infor">
                <div class="avt">
                    <img
                        style="width: 55px; height: 55px; border-radius: 100%;"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-L-UQBMvNKteW4niUJySPtT56ZREEObnrBXHmDAP86xTZX24eNiqFKwJg9tfSGVgpOSw&usqp=CAU"
                        alt=""
                    />
                </div>
            </div>`
            );
        });
        $(".chat .list .infor").click(function () {
            $(this).hide();
            $(".windown").show();
        });
    },
};
</script>
