<template>
    <div class="card mb-3 w-100">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img :src="imgSrc" class="card-img rounded-0" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{title}}</h2>
                    <small class="text-success">{{ city + ', ' + address}}</small>
                    <p class="card-text text-muted">
                        {{description.length > maxDescriptionLength ?
                        description.substring(0,maxDescriptionLength)+'...' :
                        description}}
                    </p>

                    <div class="mt-2">
                        <h5 v-for="client in clients" class="d-inline-block">
                            <span class="badge badge-light text-success m-2">{{client}}</span>
                        </h5>
                    </div>

                    <div class="mt-2">
                        <h5 v-for="type in types" class="d-inline-block">
                            <span class="badge badge-info text-light m-2">{{type}}</span>
                        </h5>
                    </div>

                    <div class="mt-2">
                        <h5 v-for="option in options" class="d-inline-block">
                            <span class="badge badge-success text-light m-1">{{option}}</span>
                        </h5>
                    </div>

                    <p class="card-text">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </p>
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

            city: '',

            address : '',

            description: '',

            options : '',

            clients : '',

            types : '',

            /***************/

            maxDescriptionLength : {
                type : Number
            }

        }
    }
</script>