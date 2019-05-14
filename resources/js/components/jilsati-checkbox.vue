<template>
    <div class="custom-control custom-checkbox text-right mr-3 mb-2">
        <input type="checkbox" class="custom-control-input" :id="name" :name="name">
        <label class="custom-control-label" :for="name"><slot></slot></label>
    </div>
</template>


<script>
    export default {
        props : {
            name : {
                required : true,

                type : String
            }
        }
    }
</script>