<template>
    <div class="tabcontent">
        <ul>
            <li class="active">NewFeeds</li>
            <li>Photos</li>
        </ul>
    </div>
</template>
<style>
.tabcontent {
    margin: 50px 0px 30px 0px;
}
.tabcontent ul {
    display: flex;
    padding: 0px;
    border-bottom: 1px solid;
    border-color: #0000000c;
}
.tabcontent ul li {
    list-style: none;
    padding: 0px 10px;
    cursor: pointer;
}
.tabcontent ul .active{
    border-bottom: 1px solid #8224e3;
    color: #8224e3;
    font-weight: 600;
}
</style>
