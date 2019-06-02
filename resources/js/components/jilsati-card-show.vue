<template functional>
    <div class="card shadow mb-3 w-100">
        <div class="row no-gutters">
            <div class="col-md-4">
                <a v-if="props.jilsahId" :href="'/jilsahs/'+props.jilsahId">
                    <img :src="props.imgSrc" class="card-img rounded-0" alt="صورة الجلسة الرئيسية" style="max-height: 350px;">
                </a>

                <img v-else :src="props.imgSrc" class="card-img rounded-0" alt="صورة الجلسة الرئيسية" style="max-height: 350px;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{props.title}}</h2>
                    <h4 class="text-success">{{ props.city + ', ' + props.address}}</h4>
                    <p class="card-text text-muted">
                        {{props.description.length > props.maxDescriptionLength ?
                        props.description.substring(0,props.maxDescriptionLength)+'...' :
                        props.description}}
                    </p>

                    <div class="row">

                        <div class="col-8 border-left">
                            <div class="mt-2">
                                <h3 v-for="client in props.clients" class="d-inline-block">
                                    <span class="badge badge-light text-success m-2">{{client}}</span>
                                </h3>
                            </div>

                            <div class="mt-2">
                                <h4 v-for="type in props.types" class="d-inline-block">
                                    <span class="badge badge-info text-light m-2">{{type}}</span>
                                </h4>
                            </div>

                            <div class="mt-2">
                                <h6 v-for="option in props.options" class="d-inline-block">
                                    <span class="badge badge-success text-light m-1">{{option}}</span>
                                </h6>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="mt-2">
                                <star-rating read-only :show-rating="false" :increment="0.5" :rating="props.rating" rtl :star-size="20"></star-rating>
                            </div>

                            <p class="card-text">
                                <small class="text-muted">{{props.ratingsCount}} تقييم</small>
                            </p>

                            <div class="mt-2">
                                <p class="text-success text-lg-right">{{'السعر ' + props.price + 'ر.س ' + (parseInt(props.pricePerJilsah) ? 'للجلسة' : 'للشخص')}}</p>
                            </div>
                        </div>
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

            ratingsCount : 0,

            price : '',

            pricePerJilsah : '',

            jilsahId : '',

            /***************/

            maxDescriptionLength : {
                type : Number
            },

        },

        computed : {
            pricePerJilsahLabel : function () {
                return parseInt(this.pricePerJilsah) ? 'للجلسة' : 'للشخص' ;
            }
        },
    }
</script>