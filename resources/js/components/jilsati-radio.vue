<template>
    <div class="custom-control custom-radio text-right mr-3 mb-2" :class="{'custom-control-inline' : inline}">
        <input @change="onChange" type="radio" class="custom-control-input" :id="name + postfix" :name="name" :checked="checked ? 'checked' : ''">

        <label class="custom-control-label" :for="name + postfix">{{val}}</label>
    </div>
</template>


<script>
    export default {
        props : {
            name : {
                required : true,

                type : String
            },

            val : {
                required : true,
            },

            checked : {
                required: false,

                type : Boolean
            },

            postfix : {
                required : false,

                default : ''
            },

            inline : {
                required : false,

                type : Boolean
            },

            value : '',
        },

        model : {
            prop : 'value',
            event : 'change'
        },

        methods : {
            onChange : function (event) {
                this.$emit('change',this.val);
            }
        },

        created() {
            if(this.checked){
                this.$emit('change',this.val);
            }
        }
    }
</script>