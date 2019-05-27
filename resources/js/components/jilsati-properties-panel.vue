<template functional>
    <div class="card shadow-sm mb-3 rounded-0">
        <div class="card-body">
            <p class="card-title mb-5 text-success h2">خصائص الجلسة</p>

            <div class="mb-4">
                <p class="card-subtitle mb-3 text-info h4">تستقبل:</p>
                <h3 v-for="client in props.clientTypes" class="d-inline">
                    <span class="badge badge-light text-success m-2">{{client}}</span>
                </h3>
            </div>

            <div class="mb-4">
                <p class="card-subtitle mb-3 text-info h4">نوع الجلسة:</p>
                <h4 v-for="type in props.jilsahTypes" class="d-inline">
                    <span class="badge badge-light text-success m-2">{{type}}</span>
                </h4>
            </div>

            <div class="mb-4">
                <p class="card-subtitle mb-3 text-info h4">مميزات الجلسة:</p>
                <h5 v-for="option in props.options" class="d-inline">
                    <span class="badge badge-success text-light m-1">{{option}}</span>
                </h5>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['clientTypes','jilsahTypes','options']
    }
</script>