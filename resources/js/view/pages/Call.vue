<template>
    <div class="call">
        <video class="video-player" id="CallFrom" autoplay playsinline></video>
        <video class="video-player" id="CallTo" autoplay playsinline></video>
    </div>
</template>
<style scoped>
.call {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}
.video-player {
    width: 100%;
    height: 400px;
    background-color: black;
}
@media screen and (max-width: 600px) {
    .call {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }
}
</style>

<script></script>
