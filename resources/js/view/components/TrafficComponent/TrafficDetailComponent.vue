<template>
    <div class="traffic">
        <button class="action-btn">
            <i class="fas fa-heart"></i>
            <span>1</span>
        </button>
        <button class="action-btn">
            <i class="fa-solid fa-comment-dots"></i>
            <span>1</span>
        </button>
        <button class="action-btn">
            <i class="fas fa-share"></i>
            <span>1</span>
        </button>
    </div>
</template>
<style scoped>
.traffic {
    display: flex;
    margin-top: 20px;
}
.action-btn[data-v-5a2d311e] {
    display: flex;
}
.action-btn {
    background-color: transparent;
    border: none;
    cursor: pointer;
    outline: none;
    transition: color 0.3s;
}

.action-btn i {
    font-size: 18px;
    background-color: #4f526123;
    border-radius: 100%;
    padding: 10px;
    margin-right: 10px;
}

.fa-heart {
}

.fa-comment,
.fa-share {
    color: #000000;
}
.action-btn .active {
    color: #ff0000;
}
</style>
