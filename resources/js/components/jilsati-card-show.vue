<template>
    <div class="card shadow-sm rounded-0">
        <div class="card-header text-info row">
            <div class="col-4 d-inline text-right">
                <span class="badge badge-success  shadow-sm">مكة</span>
            </div>
            <div class="col-4 d-inline text-center">
                <h5>
                    <span class="badge badge-warning shadow-sm">150 ر.س</span>
                </h5>
            </div>
            <div class="col-4 d-inline text-left">
                <span class="badge badge-info shadow-sm">ثلاث نجوم</span>
            </div>
        </div>
        <jilsati-carousel :images="images"></jilsati-carousel>
        <div class="card-body">
            <h5 class="card-title text-right">شاليهات الواحة</h5>
            <p class="card-text text-right">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, debitis delectus dolore doloremque enim id, inventore laudantium minus numquam quisquam, quos recusandae voluptatem voluptates! Aspernatur blanditiis doloremque est libero tempore?</p>
        </div>
        <div class="card-footer text-right">
            <small class="text-muted">1999/05/23</small>
        </div>
    </div>
</template>

<script>

    export default {
        props : ['images']
    }
</script>
