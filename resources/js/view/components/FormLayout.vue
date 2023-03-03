<template>
    <div class="forms">
        <div class="post-new">
            <form action="" method="post">
                <div class="show">
                    <img
                        class="avt"
                        src=""
                        alt=""
                    />
                    <input type="text" placeholder="What's new, NTruong?" />
                </div>
                <div class="content">
                    <div class="write">
                        <img
                            class="avt"
                            src=""
                            alt=""
                        />
                        <textarea
                            placeholder="What's new, NTruong?"
                            name=""
                            id=""
                            cols="30"
                            rows="5"
                            autofocus
                        ></textarea>
                    </div>
                    <div class="files">
                        <!-- <i class="fa-solid fa-file"></i> <span></span> -->
                    </div>
                    <div class="choise">
                        <select name="" id="">
                            <option value="">Post in: Profile</option>
                            <option value="">Post in: Photo</option>
                            <option value="">Post in: Watch</option>
                            <option value="">Post in: Shop</option>
                        </select>
                        <div class="button">
                            <span class="cancel">Cancel</span>
                            <button>Post Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<style>
.forms .post-new img {
    width: 50px;
    height: 50px;
}
.forms .post-new form {
    width: 100%;
    background-color: white;
    padding: 5%;
    border-radius: 20px;
}
.forms .post-new form::placeholder {
}
.forms .post-new form .show {
    display: flex;
}
.forms .post-new form .content {
    display: none;
}
.forms .post-new form .show input {
    margin-left: 10px;
    width: 100%;
    border: 0px;
    outline: none;
    border: 1px solid;
    border-color: #e7edf277;
    border-radius: 20px;
    padding: 0px 2%;
    font-size: 13px;
    height: 40px;
    margin-top: 5px;
}
.forms .post-new form .avt {
    border-radius: 100%;
}
.forms .post-new form .write {
    display: flex;
    border-bottom: 1px solid;
    border-color: #e7edf2;
}
.forms .post-new form textarea {
    width: 100%;
    border: 0px;
    margin-left: 10px;
    outline: none;
    resize: none;
    padding: 0px 2%;
    font-size: 13px;
}
.forms .post-new form .choise {
    margin-top: 2%;
    display: flex;
    justify-content: space-between;
    flex-wrap: nowrap;
}
.forms .post-new form .choise select {
    border: 1px solid #e7edf2;
    padding: 1% 5% 1% 2%;
    border-radius: 20px;
    outline: none;
    font-size: 14px;
    font-weight: 100;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16px' height='16px' viewBox='0 0 24 24' fill='none'%3E%3Cpath d='M6.1018 8C5.02785 8 4.45387 9.2649 5.16108 10.0731L10.6829 16.3838C11.3801 17.1806 12.6197 17.1806 13.3169 16.3838L18.8388 10.0731C19.5459 9.2649 18.972 8 17.898 8H6.1018Z' fill='%23212121'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 0.5rem center;
}
select::-ms-expand {
    display: none;
}
.forms .post-new form .choise .button {
    width: 50%;
    text-align: right;
}
.forms .post-new form .choise span {
    color: #8224e3;
    font-size: 13px;
    cursor: pointer;
    margin: 0px 4%;
}
.forms .post-new form .choise button {
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
    font-size: 12px;
    outline: none;
    padding: 2% 10%;
    border-radius: 20px;
}
</style>

<script>
import $ from "jquery";
export default {
    setup() {},
    mounted() {
        $(".forms .show input").click(function () {
            $(".forms .content").show();
            $(".forms .show").hide();
            $(".forms .content").find('textarea').focus();
        });
        $(".cancel").click(function () {
            $(".forms .content").hide();
            $(".forms .show").show();
        });
    },
};
</script>
