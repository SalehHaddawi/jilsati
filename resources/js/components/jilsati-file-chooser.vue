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
            },

            maxSizeInMb : {
                type : Number
            },

            fileTypes : {
                type : Array
            }
        },

        data : function(){
          return {
              cont : this.content,

              allowedFileTypes : []
          }
        },

        methods : {
            onChange : function (event) {
                if(event.target.files) {
                    let files = event.target.files;
                    for (let i=0;i<files.length;i++){

                        let fileSize = files[i].size/1024/1024;

                        fileSize = fileSize.toFixed(2);

                        if(files[i].type.startsWith('image/') && this.allowedFileTypes.includes(files[i].type) && fileSize <= this.maxSizeInMb) {

                            this.cont = files[i].name;

                            let vue = this;

                            const reader = new FileReader();
                            reader.onload = function (e) {
                                vue.$emit('image-changed', {name:files[i].name,src:e.target.result,file:files[i]});
                            };
                            reader.readAsDataURL(event.target.files[i]);
                        }else{
                            let msg1 = 'الملف ' + '<strong>'+files[i].name+'</strong>' +' ليس من نوع ملفات الصور ';

                            if(!files[i].type.startsWith('image/')){
                                this.$emit('image-error',msg1);
                            }else if(!this.allowedFileTypes.includes(files[i].type)){
                                this.$emit('image-error','صيغة الملف '+'<strong>'+files[i].name+'</strong>'+' ليس مسموح بها');
                            }else{
                                this.$emit('image-error',' الملف '+'<strong>'+files[i].name+'</strong>'+' حجمه '+' ('+fileSize+'mb) '+' اكبر من اقصى حجم مسموح لملفات الصور وهو '+this.maxSizeInMb+'mb');
                            }
                        }
                    }
                }
            }
        },

        created() {
            if(this.fileTypes){
                for (let i=0;i<this.fileTypes.length;i++){
                    this.allowedFileTypes[i] = 'image/'+this.fileTypes[i];
                }
            }
        }
    }
</script>