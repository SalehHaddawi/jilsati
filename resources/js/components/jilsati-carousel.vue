<template functional>
    <div :id="props.name" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li v-for="index in props.images.length" :data-target="'#'+props.name" :data-slide-to="index-1" class="active">
            </li>
        </ol>
        <div class="carousel-inner bg-dark">
            <div v-for="(image,index,) in props.images" :key="image" class="carousel-item" :class="{active : index === 1}">
                <img :src="'/storage/'+image" class="d-block w-100 mx-auto" alt="..." style="max-width: 750px;max-height: 500px;">
            </div>
        </div>
        <a class="carousel-control-prev" :href="'#'+props.name" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" :href="'#'+props.name" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</template>

<script>
    export default {
        props : ['name','images']
    }
</script>