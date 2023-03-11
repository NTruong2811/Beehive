<template>
    <div class="traffic">
        <button class="action-btn">
            <i class="fas fa-heart"></i><br />
            <span>1</span>
        </button>
        <button class="action-btn">
            <i class="fa-solid fa-comment-dots"></i> <br />
            <span>1</span>
        </button>
        <button class="action-btn">
            <i class="fas fa-share"></i><br />
            <span>1</span>
        </button>
    </div>
</template>

<style scoped>
.action-btn {
    background-color: transparent;
    border: none;
    cursor: pointer;
    margin: 0 10px;
    outline: none;
    transition: color 0.3s;
}

.action-btn i{
  font-size: 20px;
  background-color: #4f526123;
   border-radius: 100%;
   padding: 12px;
}

.fa-heart {
    color: #ff0000;
}

.fa-comment,
.fa-share {
    color: #000000;
}

</style>
