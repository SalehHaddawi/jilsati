<template>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li v-for="image in 10" data-target="#carouselExampleIndicators" :data-slide-to="image-1" class="active"></li>
        </ol>
        <div class="carousel-inner bg-dark">
            <div v-for="image in 10" :key="image" class="carousel-item" :class="{active : image === 1}">
                <img :src="'/images/istraha-'+(image%3 + 1)+'.jpg'" class="d-block w-100 mx-auto" alt="..." style="max-width: 750px">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</template>

<script>
    export default {
        props : ['images']
    }
</script>