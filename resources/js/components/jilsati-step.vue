<template>
    <div class="step">
        <div>
            <div class="step-circle" :class="'bg-' + status.state">{{number}}</div>
            <div :class="stepLineClasses"></div>
        </div>
        <div>
            <div class="step-title">
                <a style="text-decoration: none;" class="btn-link" :class="aTextClasses" data-toggle="collapse" :href="'#' + id" role="link" aria-expanded="false" :aria-controls="id">
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
        props : ['id','title','number', 'rtl','status'],

        computed : {
            stepLineClasses : function () {
                return this.rtl ? 'step-line-rtl' : 'step-line-ltr' + ' border-' + this.status.state;
            },

            aTextClasses : function () {
                return 'text-' + this.status.state + (this.status.disabled ? ' disabled' : '');
            }
        },
    }
</script>