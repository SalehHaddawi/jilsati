<template>
    <div class="modal fade rtl" :data-backdrop="notDismissible ? 'static' : 'true'" :data-keyboard="false" :id="id" tabindex="-1" role="dialog" :aria-labelledby="id+'-title'" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header rtl">
                    <h5 class="modal-title" :id="id+'-title'">{{title}}</h5>
                    <button v-if="!notDismissible" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : {
            id : {
                required : true
            },

            title : '',

            notDismissible : {
                type : Boolean
            }
        }
    }
</script>