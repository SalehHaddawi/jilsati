<template>
    <select class="custom-select" :id="name" :name="name">
        <option v-if="labelOption" selected disabled>{{labelOption}}</option>

        <option v-for="option in options">{{option}}</option>
    </select>
</template>

<script>
    export default {
        props : ['name','labelOption','options']
    }
</script>