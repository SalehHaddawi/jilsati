<template>
    <select @change="onChange" class="custom-select" :id="name" :name="name">
        <option v-if="optionsLabel" selected disabled>{{optionsLabel}}</option>

        <option v-for="option in options">{{option}}</option>
    </select>
</template>

<script>
    export default {
        props : ['value','name','optionsLabel','options'],

        model: {
            prop: 'value',
            event: 'change'
        },

        data : function () {
            return {
                content : this.value
            }
        },

        methods : {
            onChange : function (e) {
                if(e.target.options.selectedIndex > -1) {
                    this.$emit('change', e.target.options[e.target.options.selectedIndex].innerText);
                }

            }
        }
    }
</script>