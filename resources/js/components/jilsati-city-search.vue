<template>
    <div class="container">
            <div class="input-group form-group py-2 mb-3 row">
                <div class="input-group-prepend">
                    <button class="btn btn-info btn-outline-secondary ml-2" type="submit">ابحث</button>
                </div>
                <select dir="rtl" class="form-control col-lg-2 col-4">
                    <option>اي شي</option>
                    <option>جلسات</option>
                    <option>استراحات</option>
                </select>
                <select dir="rtl" class="form-control col-lg-10 col-8">
                    <option selected="selected" disabled="disabled">اختار المدينة...</option>

                    <option v-for="city in cities" :key="city.id">{{city.name}}</option>
                </select>
            </div>
    </div>
</template>

<script>
    export default {
        props : ['cities'],

        data : function(){
          return {
              city : ''
          }
        },
    }
</script>
