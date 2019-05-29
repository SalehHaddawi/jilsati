<template>
    <div class="step">
        <div>
            <div class="step-circle" :class="'bg-' + status.state">{{number}}</div>
            <div :class="stepLineClasses"></div>
        </div>
        <div>
            <div class="step-title" @click="toggleCollapse()"><!--data-toggle="collapse"-->
                <a style="text-decoration: none;cursor: pointer;" class="btn-link" :class="aTextClasses" role="link" aria-expanded="false" :aria-controls="status.id">
                    {{title}}
                </a>
            </div>
            <br><br>
            <div :id="status.id" class="collapse step-body">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['title','number', 'rtl','status'],

        methods : {
            toggleCollapse :function () {
                if(!this.status.disabled)
                    this.$emit('on-toggle-collapse',this.status.id);
            }
        },

        computed : {
            stepLineClasses : function () {
                return (this.rtl ? 'step-line-rtl' : 'step-line-ltr') + ' border-' + this.status.state;
            },

            aTextClasses : function () {
                return 'text-' + this.status.state + (this.status.disabled ? ' disabled' : '');
            }
        },
    }
</script>