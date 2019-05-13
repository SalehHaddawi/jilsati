<template>
    <div class="container">
        <select v-if="justSearch" name="city" dir="rtl" class="form-control col-lg-10 col-8">
            <option selected="selected" disabled="disabled">اختار المدينة...</option>

            <option v-for="city in cities" :key="city.id">{{city.name}}</option>
        </select>

        <form v-else method="get" action="/search" class="form-group input-group py-2 mb-3 row">
            <input class="btn btn-success ml-2" type="submit" role="button" value="ابحث"/>
            <select name="type" dir="rtl" class="form-control col-lg-2 col-4">
                <option selected="selected">جلسات</option>
                <option>استراحات</option>
            </select>
            <select name="city" dir="rtl" class="form-control col-lg-10 col-8">
                <option selected="selected" disabled="disabled">اختار المدينة....</option>

                <option v-for="city in cities" :key="city.id">{{city.name}}</option>
            </select>
        </form>
    </div>
</template>

<script>
    export default {
        props : ['cities', 'justSearch'],

        data : function(){
          return {
              city : ''
          }
        },
    }
</script>
