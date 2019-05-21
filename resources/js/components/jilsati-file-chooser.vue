<template>
    <div class="custom-file text-center">
        <input @change="onChange($event)" type="file" class="custom-file-input" :id="name">
        <label class="custom-file-label" :for="name" :data-browse="browse">
            {{cont}}
        </label>
    </div>
</template>

<script>
    export default {
        props : ['name','browse','content'],

        data : function(){
          return {
              cont : this.content,
          }
        },

        methods : {
            onChange : function (event) {
                if(event.target.files && event.target.files[0] && event.target.files[0].type.startsWith('image/')) {
                    this.cont = event.target.files[0].name;

                    let vue = this;

                    const reader = new FileReader();
                    reader.onload = function(e){vue.$emit('main-image-changed',e.target.result)}
                    reader.readAsDataURL(event.target.files[0]);
                }
            }
        }
    }
</script>