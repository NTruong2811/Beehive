<template>
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
</template>
<style scoped>

.profile-card {
    font-family: 'Open Sans', Arial, sans-serif;
    position: relative;
    float: left;
    overflow: hidden;
    width: 33%;
    color: #ffffff;
    text-align: center;
    height: 368px;
    border: none;
}

.profile-card .background {
    width: 100%;
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
    font-size: 25px;
}

.profile-card h2 small {
    display: block;
    font-size: 15px;
    margin-top: 10px;
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
    margin: 0 5px;
}

.profile-card .icon-block {
    float: left;
    width: 100%;
    margin-top: 15px;
}

.profile-card .icon-block a {
    text-decoration: none;
}

.profile-card i:hover {
    background-color: #fff;
    color: #2E3434;
    text-decoration: none;
}
</style>

<script>
import $ from 'jquery'

export default {
    data() {
        return {

        }
    },
    components: {

    },
    props: {
        ChatUser: Object,
    },
    created() {
    },
 
};
</script>
