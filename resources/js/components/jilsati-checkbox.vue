<template>
    <div class="custom-control custom-checkbox text-right mr-3 mb-2" :class="{'custom-control-inline' : inline}">
        <input v-if="Array.isArray(value)" @change="onChange" type="checkbox" class="custom-control-input" :id="name + postfix" :name="name" :checked="checked ? 'checked' : ''">

        <input v-else @change="onChangeNotArray($event)" type="checkbox" class="custom-control-input" :id="name + postfix" :name="name" :checked="checked ? 'checked' : ''">

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

            value : ''
        },

        model : {
            prop : 'value',
            event : 'change',
        },

        methods : {
            onChange : function () {
                if(this.value.includes(this.name)){
                    this.value.splice(this.value.indexOf(this.name), 1)
                } else {
                    this.value.push(this.name)
                }
            },

            onChangeNotArray : function (event) {
                this.$emit('change',this.checked ? this.checked : event.target.checked);
            }
        },

        created() {
            if(this.checked){
                if(Array.isArray(this.value)){
                   this.onChange();
                }else{
                    this.onChangeNotArray(null);
                }
            }
        }
    }
</script>