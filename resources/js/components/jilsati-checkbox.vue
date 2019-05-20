<template>
    <div class="custom-control custom-checkbox text-right mr-3 mb-2" :class="{'custom-control-inline' : inline}">
        <input @change="onChange" type="checkbox" class="custom-control-input" :id="name + postfix" :name="name" :checked="checked ? 'checked' : ''">

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
            },
        },

        methods : {
            onChange : function (event) {
                this.$emit('checked-value-changed',this.name,event.target.checked);
            }
        }
    }
</script>