<template>
    <div>
        <nav class="m-auto" aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item shadow-sm">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li v-for="page in pages" class="page-item shadow-sm"><a class="page-link" href="#">{{page}}</a></li>
                <li class="page-item shadow-sm">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
    export default {
        props : {
            pages : {
                type : Number,
                required : true
            }
        }
    }
</script>