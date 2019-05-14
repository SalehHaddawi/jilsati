<template>
    <div class="card shadow-sm rounded-0 col-lg-4 col-md-6 col-sm-6 col-12">
        <img :src="imgSrc" class="card-img-top pt-1" alt="...">
        <div class="card-body">
            <h5 class="card-title text-right">{{title}}</h5>
            <p class="card-text text-right">{{ (description.length > 50 ? description.substring(0,50) + '...' : description) }}</p>
        </div>
        <div class="card-footer text-right">
            <small class="text-muted">{{addedAt}}</small>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['imgSrc','title', 'description','addedAt']
    }
</script>
