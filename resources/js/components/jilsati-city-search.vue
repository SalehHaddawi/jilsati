<template>
    <div class="container">
            <div class="input-group form-group py-2 mb-3 row">
                <form method="get" action="search" class="form-group input-group-prepend">
                    <input class="btn btn-info btn-outline-secondary ml-2" type="submit" role="button" value="ابحث"/>
                </form>
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
