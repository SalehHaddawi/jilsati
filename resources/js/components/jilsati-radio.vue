<template>
    <div class="custom-control custom-radio text-right mr-3 mb-2" :class="{'custom-control-inline' : inline}">
        <input type="radio" class="custom-control-input" :id="name + postfix" :name="name" :checked="checked ? 'checked' : ''">
        <label class="custom-control-label" :for="name + postfix"><slot></slot></label>
    </div>
</template>


<script>
    export default {
        props : {
            name : {
                required : true,

                type : String
            },

            checked : {
                required: false
            },

            postfix : {
                required : false,

                default : ''
            },

            inline : {
                required : false
            }
        }
    }
</script>