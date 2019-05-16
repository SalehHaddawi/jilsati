<template>
    <div class="card shadow-sm rounded-0 col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card-header text-info row">
            <div class="col-4 d-inline text-right">
                <span class="badge badge-success  shadow-sm">{{city}}</span>
            </div>
            <div class="col-4 d-inline text-center">
                <h5>
                    <span class="badge badge-warning shadow-sm">{{(price ?  price + 'ر.س' : Math.floor(Math.random() * (+4000 - +150)) + +150) + ' ر.س'}}</span>
                </h5>
            </div>
            <div class="col-4 d-inline text-left">
                <span class="badge badge-info shadow-sm">{{(comments ?  comments + 'تقييم' : Math.floor(Math.random() * (+40 - +0)) + +0) + ' تقييم'}}</span>
            </div>
        </div>
        <a :href="'/jilsahs/'+id"><img :src="imgSrc" class="card-img-top pt-1" style="cursor: pointer" alt="..."></a>
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
        props : ['id','imgSrc','title', 'description','addedAt','city','price', 'comments']
    }
</script>
