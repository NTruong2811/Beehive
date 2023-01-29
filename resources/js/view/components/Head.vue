<template>
    <div class="head">
        <div class="search">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Search..." />
        </div>
        <div class="nav">
            <ul>
                <li>
                    <i class="fa-solid fa-user-plus"></i>
                    <div class="num">
                        <span>10</span>
                    </div>
                </li>
                <li>
                    <i class="fa-solid fa-bell"></i>
                    <div class="num">
                        <span>0</span>
                    </div>
                </li>
                <li>
                    <i class="fa-solid fa-bag-shopping"></i>
                    <div class="num">
                        <span>0</span>
                    </div>
                </li>
                <li>
                    <img
                        class="avt"
                        src="https://yeuphaidep.com/wp-content/uploads/2022/05/he-nu-cuoi-khinh-bi.jpg"
                        alt=""
                    />
                </li>
            </ul>
        </div>
    </div>
</template>
<style>
.head {
    border-bottom: 1px solid #4f52611c;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0px 3% !important;
}
.head .search i {
    margin-right: 10px !important;
}
.head .search input {
    border: 0px;
    background-color: #FBFAFC;
}
.head .search input {
    outline: none;
}
.head .avt {
    width: 50px;
    height: 50px;
    border-radius: 100%;
}
.head ul {
    display: flex;
    align-items: center;
    gap: 30px;
    height: 100%;
}
.head ul li {
    list-style: none;
    position: relative;
}
.head ul li .num {
    position: absolute;
    right: -5px;
    top: 16px;
    color: white;
    background-color: red;
    height: auto;
    padding: 0px 3px !important;
    border-radius: 100%;
    font-size: 10px;
}
</style>
