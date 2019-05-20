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
              cont : this.content
          }
        },

        methods : {
            onChange : function (event) {
                if(event.target.files && event.target.files[0])
                    this.cont = event.target.files[0].name;
            }
        }
    }
</script>