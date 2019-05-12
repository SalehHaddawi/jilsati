<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fonts p-3 mb-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand text-lg-center" href="/">
            <img src="images/jilsati-logo.png" alt="jilsati-logo" height="60">
        </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item pl-2 pr-2">
                    <a class="nav-link btn btn-success" style="color: #ffffff;" href="#">اضف جلستك/استراحتك</a>
                </li>
                <li class="nav-item pl-2 pr-2" :class="{active : active === 'contact'}">
                    <a class="nav-link" href="#">تواصل معانا<span v-if="active === 'contact'" class="sr-only">(الحالية)</span></a>
                </li>
                <li class="nav-item pl-2 pr-2" :class="{active : active === 'about'}">
                    <a class="nav-link" href="#">عن جلستي<span v-if="active === 'about'" class="sr-only">(الحالية)</span></a>
                </li>
                <li class="nav-item pl-2 pr-2" :class="{active : active === 'login'}">
                    <a class="nav-link" href="#">دخول/تسجيل<span v-if="active === 'login'" class="sr-only">(الحالية)</span></a>
                </li>
                <li class="nav-item pl-2 pr-2" :class="{active : active === 'main'}">
                    <a class="nav-link" href="#">الصفحة الرئيسية<span v-if="active === 'main'" class="sr-only">(الحالية)</span></a>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        props : ['active']
    }
</script>
