<template>
    <div class="step">
        <div>
            <div class="step-circle">{{number}}</div>
            <div :class="rtl ? 'step-line-rtl' : 'step-line-ltr'" :style=""></div>
        </div>
        <div>
            <div class="step-title">
                <a class="btn-link" data-toggle="collapse" :href="'#' + id" role="link" aria-expanded="false" :aria-controls="id">
                    {{title}}
                </a>
            </div>
            <div :id="id" class="collapse step-body">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['id','title','number', 'rtl']
    }
</script>