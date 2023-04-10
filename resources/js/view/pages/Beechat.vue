<template>
    <Navbar></Navbar>
    <div class="profile">
        <div id="frame">
        <div id="sidepanel">
            <div id="profile">
                <div class="wrap">
                    <img id="profile-img" src="http://emilcarlsson.se/assets/mikeross.png" class="online" alt="" />
                    <p>Mike Ross</p>
                    <div id="status-options">
                        <ul>
                            <li id="status-online" class="active"><span class="status-circle"></span>
                                <p>Online</p>
                            </li>
                            <li id="status-away"><span class="status-circle"></span>
                                <p>Away</p>
                            </li>
                            <li id="status-busy"><span class="status-circle"></span>
                                <p>Busy</p>
                            </li>
                            <li id="status-offline"><span class="status-circle"></span>
                                <p>Offline</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="search">
                <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                <input type="text" placeholder="Search contacts..." />
            </div>
            <div id="contacts">
                <ul>
                    <li class="contact">
                        <div class="wrap">
                            <span class="contact-status online"></span>
                            <img src="http://emilcarlsson.se/assets/louislitt.png" alt="" />
                            <div class="meta">
                                <p class="name">Louis Litt</p>
                                <p class="preview">You just got LITT up, Mike.</p>
                            </div>
                        </div>
                    </li>
                    <li class="contact active">
                        <div class="wrap">
                            <span class="contact-status offline"></span>
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <div class="meta">
                                <p class="name">Harvey Specter</p>
                                <p class="preview">Wrong. You take the gun, or you pull out a bigger one. Or, you call their
                                    bluff. Or, you do any one of a hundred and forty six other things.</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="bottom-bar">
                <button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add
                        contact</span></button>
                <button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>
            </div>
        </div>
        <ContentChat :ChatUser="ChatUser"></ContentChat>
    </div>
    <div class="profile-card">
        <img src="https://images.pexels.com/photos/946351/pexels-photo-946351.jpeg?w=500&h=650&auto=compress&cs=tinysrgb"
            alt="profile-sample1" class="background" />
        <img src="https://randomuser.me/api/portraits/women/20.jpg" alt="profile-image" class="profile" />
        <div class="card-content">
            <h2>Savannah Fields<small>Engineer</small></h2>
            <div class="icon-block"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i
                        class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
        </div>
    </div>
    </div>
</template>
<style scoped>
body {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    background: #27ae60;
    font-family: "proxima-nova", "Source Sans Pro", sans-serif;
    font-size: 1em;
    letter-spacing: 0.1px;
    color: #32465a;
    text-rendering: optimizeLegibility;
    text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
    -webkit-font-smoothing: antialiased;
}
.profile{
    display: flex;
}
#frame {
    width: 100%;
    height: 100vh;
    background: #E6EAEA;
}


#frame #sidepanel {
    float: left;
    min-width: 280px;
    max-width: 340px;
    width: 40%;
    height: 100%;
    background: #2c3e50;
    color: #f5f5f5;
    overflow: hidden;
    position: relative;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel {
        width: 58px;
        min-width: 58px;
    }
}

#frame #sidepanel #profile {
    width: 80%;
    margin: 25px auto;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #profile {
        width: 100%;
        margin: 0 auto;
        padding: 5px 0 0 0;
        background: #32465a;
    }
}

#frame #sidepanel #profile.expanded .wrap {
    height: 210px;
    line-height: initial;
}

#frame #sidepanel #profile.expanded .wrap p {
    margin-top: 20px;
}

#frame #sidepanel #profile.expanded .wrap i.expand-button {
    -moz-transform: scaleY(-1);
    -o-transform: scaleY(-1);
    -webkit-transform: scaleY(-1);
    transform: scaleY(-1);
    filter: FlipH;
    -ms-filter: "FlipH";
}

#frame #sidepanel #profile .wrap {
    height: 60px;
    line-height: 60px;
    overflow: hidden;
    -moz-transition: 0.3s height ease;
    -o-transition: 0.3s height ease;
    -webkit-transition: 0.3s height ease;
    transition: 0.3s height ease;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #profile .wrap {
        height: 55px;
    }
}

#frame #sidepanel #profile .wrap img {
    width: 50px;
    border-radius: 50%;
    padding: 3px;
    border: 2px solid #e74c3c;
    height: auto;
    float: left;
    cursor: pointer;
    -moz-transition: 0.3s border ease;
    -o-transition: 0.3s border ease;
    -webkit-transition: 0.3s border ease;
    transition: 0.3s border ease;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #profile .wrap img {
        width: 40px;
        margin-left: 4px;
    }
}

#frame #sidepanel #profile .wrap img.online {
    border: 2px solid #2ecc71;
}

#frame #sidepanel #profile .wrap img.away {
    border: 2px solid #f1c40f;
}

#frame #sidepanel #profile .wrap img.busy {
    border: 2px solid #e74c3c;
}

#frame #sidepanel #profile .wrap img.offline {
    border: 2px solid #95a5a6;
}

#frame #sidepanel #profile .wrap p {
    float: left;
    margin-left: 15px;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #profile .wrap p {
        display: none;
    }
}

#frame #sidepanel #profile .wrap i.expand-button {
    float: right;
    margin-top: 23px;
    font-size: 0.8em;
    cursor: pointer;
    color: #435f7a;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #profile .wrap i.expand-button {
        display: none;
    }
}

#frame #sidepanel #profile .wrap #status-options {
    position: absolute;
    opacity: 0;
    visibility: hidden;
    width: 150px;
    margin: 70px 0 0 0;
    border-radius: 6px;
    z-index: 99;
    line-height: initial;
    background: #435f7a;
    -moz-transition: 0.3s all ease;
    -o-transition: 0.3s all ease;
    -webkit-transition: 0.3s all ease;
    transition: 0.3s all ease;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #profile .wrap #status-options {
        width: 58px;
        margin-top: 57px;
    }
}

#frame #sidepanel #profile .wrap #status-options.active {
    opacity: 1;
    visibility: visible;
    margin: 75px 0 0 0;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #profile .wrap #status-options.active {
        margin-top: 62px;
    }
}

#frame #sidepanel #profile .wrap #status-options:before {
    content: '';
    position: absolute;
    width: 0;
    height: 0;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-bottom: 8px solid #435f7a;
    margin: -8px 0 0 24px;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #profile .wrap #status-options:before {
        margin-left: 23px;
    }
}

#frame #sidepanel #profile .wrap #status-options ul {
    overflow: hidden;
    border-radius: 6px;
}

#frame #sidepanel #profile .wrap #status-options ul li {
    padding: 15px 0 30px 18px;
    display: block;
    cursor: pointer;
    list-style: none;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #profile .wrap #status-options ul li {
        padding: 15px 0 35px 22px;
    }
}

#frame #sidepanel #profile .wrap #status-options ul li:hover {
    background: #496886;
}

#frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
    position: absolute;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    margin: 5px 0 0 0;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
        width: 14px;
        height: 14px;
    }
}

#frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
    content: '';
    position: absolute;
    width: 14px;
    height: 14px;
    margin: -3px 0 0 -3px;
    background: transparent;
    border-radius: 50%;
    z-index: 0;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
        height: 18px;
        width: 18px;
    }
}

#frame #sidepanel #profile .wrap #status-options ul li p {
    padding-left: 12px;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #profile .wrap #status-options ul li p {
        display: none;
    }
}

#frame #sidepanel #profile .wrap #status-options ul li#status-online span.status-circle {
    background: #2ecc71;
}

#frame #sidepanel #profile .wrap #status-options ul li#status-online.active span.status-circle:before {
    border: 1px solid #2ecc71;
}

#frame #sidepanel #profile .wrap #status-options ul li#status-away span.status-circle {
    background: #f1c40f;
}

#frame #sidepanel #profile .wrap #status-options ul li#status-away.active span.status-circle:before {
    border: 1px solid #f1c40f;
}

#frame #sidepanel #profile .wrap #status-options ul li#status-busy span.status-circle {
    background: #e74c3c;
}

#frame #sidepanel #profile .wrap #status-options ul li#status-busy.active span.status-circle:before {
    border: 1px solid #e74c3c;
}

#frame #sidepanel #profile .wrap #status-options ul li#status-offline span.status-circle {
    background: #95a5a6;
}

#frame #sidepanel #profile .wrap #status-options ul li#status-offline.active span.status-circle:before {
    border: 1px solid #95a5a6;
}

#frame #sidepanel #profile .wrap #expanded {
    padding: 100px 0 0 0;
    display: block;
    line-height: initial !important;
}

#frame #sidepanel #profile .wrap #expanded label {
    float: left;
    clear: both;
    margin: 0 8px 5px 0;
    padding: 5px 0;
}

#frame #sidepanel #profile .wrap #expanded input {
    border: none;
    margin-bottom: 6px;
    background: #32465a;
    border-radius: 3px;
    color: #f5f5f5;
    padding: 7px;
    width: calc(100% - 43px);
}

#frame #sidepanel #profile .wrap #expanded input:focus {
    outline: none;
    background: #435f7a;
}

#frame #sidepanel #search {
    border-top: 1px solid #32465a;
    border-bottom: 1px solid #32465a;
    font-weight: 300;
    background-color: #32465a;
}
#frame #sidepanel #search input{
    width: 100%;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #search {
        display: none;
    }
}

#frame #sidepanel #search label {
    position: absolute;
    margin: 10px 0 0 20px;
}

#frame #sidepanel #search input {
    font-family: "proxima-nova", "Source Sans Pro", sans-serif;
    padding: 10px 0 10px 46px;
    width: calc(100% - 25px);
    border: none;
    background: #32465a;
    color: #f5f5f5;
    outline: none;
}

#frame #sidepanel #search input::-webkit-input-placeholder {
    color: #f5f5f5;
}

#frame #sidepanel #search input::-moz-placeholder {
    color: #f5f5f5;
}

#frame #sidepanel #search input:-ms-input-placeholder {
    color: #f5f5f5;
}

#frame #sidepanel #search input:-moz-placeholder {
    color: #f5f5f5;
}

#frame #sidepanel #contacts {
    height: calc(100% - 177px);
    overflow-y: scroll;
    overflow-x: hidden;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #contacts {
        height: calc(100% - 149px);
        overflow-y: scroll;
        overflow-x: hidden;
    }

    #frame #sidepanel #contacts::-webkit-scrollbar {
        display: none;
    }
}

#frame #sidepanel #contacts.expanded {
    height: calc(100% - 334px);
}

#frame #sidepanel #contacts::-webkit-scrollbar {
    width: 0px;
}


#frame #sidepanel #contacts ul li.contact {
    position: relative;
    padding: 10px 0 15px 0;
    font-size: 0.9em;
    cursor: pointer;
}

ul {
    padding: 0px !important;
    margin: 0px !important;
}

#frame #sidepanel #contacts ul li {
    list-style: none;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #contacts ul li.contact {
        padding: 6px 0 46px 8px;
    }
}

#frame #sidepanel #contacts ul li.contact:hover {
    background: #32465a;
}

#frame #sidepanel #contacts ul li.contact.active {
    background: #32465a;
    border-right: 5px solid #435f7a;
}

#frame #sidepanel #contacts ul li.contact.active span.contact-status {
    border: 2px solid #32465a !important;
}

#frame #sidepanel #contacts ul li.contact .wrap {
    width: 88%;
    margin: 0 auto;
    position: relative;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #contacts ul li.contact .wrap {
        width: 100%;
    }
}

#frame #sidepanel #contacts ul li.contact .wrap span {
    position: absolute;
    left: 0;
    margin: -2px 0 0 -2px;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    border: 2px solid #2c3e50;
    background: #95a5a6;
}

#frame #sidepanel #contacts ul li.contact .wrap span.online {
    background: #2ecc71;
}

#frame #sidepanel #contacts ul li.contact .wrap span.away {
    background: #f1c40f;
}

#frame #sidepanel #contacts ul li.contact .wrap span.busy {
    background: #e74c3c;
}

#frame #sidepanel #contacts ul li.contact .wrap img {
    width: 40px;
    border-radius: 50%;
    float: left;
    margin-right: 10px;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #contacts ul li.contact .wrap img {
        margin-right: 0px;
    }
}

#frame #sidepanel #contacts ul li.contact .wrap .meta {
    padding: 5px 0 0 0;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #contacts ul li.contact .wrap .meta {
        display: none;
    }
}

#frame #sidepanel #contacts ul li.contact .wrap .meta .name {
    font-weight: 600;
}

#frame #sidepanel #contacts ul li.contact .wrap .meta .preview {
    margin: 5px 0 0 0;
    padding: 0 0 1px;
    font-weight: 400;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    -moz-transition: 1s all ease;
    -o-transition: 1s all ease;
    -webkit-transition: 1s all ease;
    transition: 1s all ease;
}

#frame #sidepanel #contacts ul li.contact .wrap .meta .preview span {
    position: initial;
    border-radius: initial;
    background: none;
    border: none;
    padding: 0 2px 0 0;
    margin: 0 0 0 1px;
    opacity: 0.5;
}

#frame #sidepanel #bottom-bar {
    position: absolute;
    width: 100%;
    bottom: 0;
}

#frame #sidepanel #bottom-bar button {
    float: left;
    border: none;
    width: 50%;
    padding: 10px 0;
    background: #32465a;
    color: #f5f5f5;
    cursor: pointer;
    font-size: 0.85em;
    font-family: "proxima-nova", "Source Sans Pro", sans-serif;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #bottom-bar button {
        float: none;
        width: 100%;
        padding: 15px 0;
    }
}

#frame #sidepanel #bottom-bar button:focus {
    outline: none;
}

#frame #sidepanel #bottom-bar button:nth-child(1) {
    border-right: 1px solid #2c3e50;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #bottom-bar button:nth-child(1) {
        border-right: none;
        border-bottom: 1px solid #2c3e50;
    }
}

#frame #sidepanel #bottom-bar button:hover {
    background: #435f7a;
}

#frame #sidepanel #bottom-bar button i {
    margin-right: 3px;
    font-size: 1em;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #bottom-bar button i {
        font-size: 1.3em;
    }
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #bottom-bar button span {
        display: none;
    }
}


/* profile */


.profile-card {
  font-family: 'Open Sans', Arial, sans-serif;
  position: relative;
  float: left;
  overflow: hidden;
  width: 33%;
  color: #ffffff;
  text-align: center;
  height:368px;
  border:none;
}
.profile-card .background {
  width:100%;
  vertical-align: top;
  opacity: 0.9;
  -webkit-filter: blur(5px);
  filter: blur(5px);
   -webkit-transform: scale(1.8);
  transform: scale(2.8);
}
.profile-card .card-content {
  width: 100%;
  padding: 15px 25px;
  position: absolute;
  left: 0;
  top: 50%;
}
.profile-card .profile {
  border-radius: 50%;
  position: absolute;
  bottom: 50%;
  left: 50%;
  max-width: 100px;
  opacity: 1;
  box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.5);
  border: 2px solid rgba(255, 255, 255, 1);
  -webkit-transform: translate(-50%, 0%);
  transform: translate(-50%, 0%);
}
.profile-card h2 {
  margin: 0 0 5px;
  font-weight: 600;
  font-size:25px;
}
.profile-card h2 small {
  display: block;
  font-size: 15px;
  margin-top:10px;
}
.profile-card i {
  display: inline-block;
    font-size: 16px;
    color: #ffffff;
    text-align: center;
    border: 1px solid #fff;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 50%;
    margin:0 5px;
}
.profile-card .icon-block{
    float:left;
    width:100%;
    margin-top:15px;
}
.profile-card .icon-block a{
    text-decoration:none;
}
.profile-card i:hover {
  background-color:#fff;
  color:#2E3434;
  text-decoration:none;
}

</style>

<script>
import $ from 'jquery'
import Navbar from "../components/Navbar.vue";
import ContentChat from '../components/ChatComponent/ContentChat.vue';
import {GetChatDetail} from "../../services/Chat"
import { GetUserProfile } from '../../services/Users';
export default {
    data(){
      return {
         ChatUser:{}
      }
    },
    components: {
        Navbar,
        ContentChat
    },
    created(){
    },
    methods:{
        SendMessage(e){
           console.log(e);
        }
    },
    mounted() {
        $(".messages").animate({ scrollTop: $(document).height() }, "fast");

        $("#profile-img").click(function () {
            $("#status-options").toggleClass("active");
        });

        $(".expand-button").click(function () {
            $("#profile").toggleClass("expanded");
            $("#contacts").toggleClass("expanded");
        });

        $("#status-options ul li").click(function () {
            $("#profile-img").removeClass();
            $("#status-online").removeClass("active");
            $("#status-away").removeClass("active");
            $("#status-busy").removeClass("active");
            $("#status-offline").removeClass("active");
            $(this).addClass("active");

            if ($("#status-online").hasClass("active")) {
                $("#profile-img").addClass("online");
            } else if ($("#status-away").hasClass("active")) {
                $("#profile-img").addClass("away");
            } else if ($("#status-busy").hasClass("active")) {
                $("#profile-img").addClass("busy");
            } else if ($("#status-offline").hasClass("active")) {
                $("#profile-img").addClass("offline");
            } else {
                $("#profile-img").removeClass();
            };

            $("#status-options").removeClass("active");
        });
        
        GetUserProfile(this.$route.query.id).then((res)=>{
            this.ChatUser = res.data
            console.log(this.ChatUser.avatar);
        })
    

        // var VueThis = this;
        // window.Echo.channel("channelchat" + this.userInfor.id).listen(
        //     "ChatEvent",
        //     function (res) {
        //         console.log(res);
        //     }
        // );
    }
};
</script>
