<template>
    <li class="list-group-item justify-content-between align-items-center bg-transparent border-0 text-right">
        <a data-toggle="collapse" :href="'#'+id" role="button" aria-expanded="false" :aria-controls="id">
            <h4 class="d-inline-block">
                <span class="mr-2 badge badge-primary badge-pill" :class="state">{{number}}</span>
            </h4>
            <h4 class="d-inline-block">{{name}}</h4>
        </a>
        <div class="collapse" :id="id">
            <slot></slot>
        </div>
    </li>
</template>

<script>
    export default {
        props : ['id','number','name'],

        data : function () {
            return {
                state : 'bg-secondary'
            }
        },
    }
</script>