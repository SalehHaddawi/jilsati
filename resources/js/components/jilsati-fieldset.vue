<template>
    <fieldset class="border p-2">
        <legend class="w-auto" :style="{'font-size' : fontSize}">{{legend}}</legend>
        <slot></slot>
    </fieldset>
</template>

<script>
    export default {
        props : ['legend','fontSize']
    }
</script>