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
                          :images="allImages">
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

            mainImage : '',

            images : {
                required : false
            },

            description : ''
        },

        computed : {
            allImages : function () {
                let arr = [];

                arr.push(this.mainImage);

                for (let i = 0; i < this.images.length;i++){
                    arr.push(this.images[i]);
                }

                return arr;
            }
        },
    }
</script>