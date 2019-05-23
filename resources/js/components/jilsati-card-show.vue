<template>
    <div class="card shadow mb-3 w-100">
        <div class="row no-gutters">
            <div class="col-md-5">
                <img :src="imgSrc" class="card-img rounded-0" alt="...">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h2 class="card-title">{{title}}</h2>
                    <h4 class="text-success">{{ city + ', ' + address}}</h4>
                    <p class="card-text text-muted">
                        {{description.length > maxDescriptionLength ?
                        description.substring(0,maxDescriptionLength)+'...' :
                        description}}
                    </p>

                    <div class="mt-2">
                        <h3 v-for="client in clients" class="d-inline-block">
                            <span class="badge badge-light text-success m-2">{{client}}</span>
                        </h3>
                    </div>

                    <div class="mt-2">
                        <h4 v-for="type in types" class="d-inline-block">
                            <span class="badge badge-info text-light m-2">{{type}}</span>
                        </h4>
                    </div>

                    <div class="mt-2">
                        <h5 v-for="option in options" class="d-inline-block">
                            <span class="badge badge-success text-light m-1">{{option}}</span>
                        </h5>
                    </div>

                    <div class="mt-2">
                        <star-rating read-only :show-rating="false" :rating="rating" :star-size="20"></star-rating>
                    </div>

                    <p class="card-text">
                        <small class="text-muted">20 تقييم</small>
                    </p>

                    <div class="mt-2">
                        <p class="text-success text-lg-right">{{'السعر ' + price + 'ر.س ' + pricePer}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : {
            imgSrc : '',

            title : '',

            description: '',

            city: '',

            address : '',

            options : '',

            clients : '',

            types : '',

            rating : '',

            price : '',

            pricePer : '',

            /***************/

            maxDescriptionLength : {
                type : Number
            },

        }
    }
</script>