<template>
    <div class="card mb-3 rounded-0 shadow-sm">
        <div class="card-body text-right">
            <p class="card-title text-success h1">{{name}}</p>
            <p class="card-text text-secondary h5">{{city}} , {{address}}</p>
            <p class="card-text">
                <small class="text-muted">{{addressDetails}}</small>
            </p>
        </div>
        <jilsati-carousel class="card-img-top"
                          name="images-carousel"
                          :images="images">
        </jilsati-carousel>
        <div class="card-body text-right">
        </div>
    </div>
</template>

<script>
    export default {
        props : {
            name : '',

            city : '',

            address : '',

            addressDetails : '',

            images : {
                type : Array
            },

            description : ''
        }
    }
</script>