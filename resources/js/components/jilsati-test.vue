<template>
    <div :style="'width:100px;height:100px;background-color:' + (black ? 'black;' : 'red;')"></div>
</template>

<script>
    export default {
        props : {
            black : {
                type : Boolean
            },

            todo : {
                type : 0
            }
        }
    }
</script>