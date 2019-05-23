<template>
    <div class="custom-file text-center">
        <input @change="onChange($event)" type="file" class="custom-file-input" :id="name" :multiple="multiple">
        <label v-if="!noLabel" class="custom-file-label" :for="name" :data-browse="browse">
            {{cont}}
        </label>
    </div>
</template>

<script>
    export default {
        props : {
            name : {
                required : true
            },

            browse : '',

            content : '',

            noLabel : {
                type : Boolean
            },

            multiple : {
                type : Boolean
            }
        },

        data : function(){
          return {
              cont : this.content,
          }
        },

        methods : {
            onChange : function (event) {
                if(event.target.files) {
                    for (let i=0;i<event.target.files.length;i++){
                        if(event.target.files[i].type.startsWith('image/')) {
                            this.cont = event.target.files[i].name;

                            let vue = this;

                            const reader = new FileReader();
                            reader.onload = function (e) {
                                vue.$emit('image-changed', {name:event.target.files[i].name,src:e.target.result});
                            };
                            reader.readAsDataURL(event.target.files[i]);
                        }
                    }
                }
            }
        }
    }
</script>