<template>
    <div class="m-lg-6 m-xl-8 m-4 alert text-center shadow-sm" :class="'alert-'+type" role="alert">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        props :{
            type : {
                required : true
            }
        },
    }
</script>