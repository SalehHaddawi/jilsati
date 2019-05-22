<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fonts p-3 mb-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand text-lg-center" href="/">
            <img :src="logoSrc" alt="jilsati-logo" height="60">
        </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item pl-2 pr-2">
                    <a class="nav-link btn btn-success" style="color: #ffffff;" href="/jilsahs/create">اضف جلستك</a>
                </li>
                <li class="nav-item pl-2 pr-2" :class="{active : active === 'contact'}">
                    <a class="nav-link" href="/contact">تواصل معانا<span v-if="active === 'contact'" class="sr-only">(الحالية)</span></a>
                </li>
                <li class="nav-item pl-2 pr-2" :class="{active : active === 'about'}">
                    <a class="nav-link" href="/about">عن جلستي<span v-if="active === 'about'" class="sr-only">(الحالية)</span></a>
                </li>
                <li class="nav-item pl-2 pr-2" :class="{active : active === 'login'}">
                    <!--<a v-if="user" class="nav-link" href="#" @click="logout()">مرحبا {{user.name}}<span v-if="active === 'login'" class="sr-only">(الحالية)</span></a>-->
                    <div v-if="user" class="dropdown nav-link">
                        <span v-if="active === 'login'" class="sr-only">(الحالية)</span>
                        <a class="text-reset dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            هلا {{user}}
                        </a>

                        <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="/personal">الملف الشخصي</a>
                            <a class="dropdown-item" href="/jilsahs">جلساتي</a>
                            <a class="dropdown-item" href="#" @click="logout()">تسجيل خروج</a>
                        </div>
                    </div>
                    <a v-else class="nav-link" href="/login">دخول/تسجيل<span v-if="active === 'login'" class="sr-only">(الحالية)</span></a>
                </li>
                <li class="nav-item pl-2 pr-2" :class="{active : active === 'main'}">
                    <a class="nav-link" href="/">الصفحة الرئيسية<span v-if="active === 'main'" class="sr-only">(الحالية)</span></a>
                </li>
            </ul>
        </div>

        <form method="post" action="/logout" id="logout-form"><input type="hidden" name="_token" :value="token"></form>
    </nav>
</template>

<script>
    export default {
        props : ['active', 'user','token','logoSrc'],

        methods : {
            logout : function () {
                document.getElementById('logout-form').submit();
            }
        }
    }
</script>
