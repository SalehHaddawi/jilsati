<template>
    <div>
        <jilsati-checkbox :postfix="idPostfix" :checked="properties['families'] === 'on'" name="families">عائلات</jilsati-checkbox>
        <jilsati-checkbox :postfix="idPostfix" :checked="properties['guys'] === 'on'" name="guys">شباب</jilsati-checkbox>
        <jilsati-checkbox :postfix="idPostfix" :checked="properties['pool']" name="pool">مسبح</jilsati-checkbox>
        <jilsati-checkbox :postfix="idPostfix" :checked="properties['women-pool'] === 'on'" name="women-pool">مسبح نساء</jilsati-checkbox>
        <jilsati-checkbox :postfix="idPostfix" :checked="properties['kids-pool'] === 'on'" name="kids-pool">مسبح اطفال</jilsati-checkbox>
        <jilsati-checkbox :postfix="idPostfix" :checked="properties['playground'] === 'on'" name="playground">ملعب</jilsati-checkbox>
        <jilsati-checkbox :postfix="idPostfix" :checked="properties['women-section'] === 'on'" name="women-section">قسم نساء منفصل</jilsati-checkbox>
        <jilsati-checkbox :postfix="idPostfix" :checked="properties['tv'] === 'on'" name="tv">تلفزيون</jilsati-checkbox>
        <jilsati-checkbox :postfix="idPostfix" :checked="properties['wifi'] === 'on'" name="wifi">واي فاي</jilsati-checkbox>
        <jilsati-checkbox :postfix="idPostfix" :checked="properties['garden'] === 'on'" name="garden">حديقة</jilsati-checkbox>
        <jilsati-checkbox :postfix="idPostfix" :checked="properties['air-condition'] === 'on'" name="air-condition">مكيفة</jilsati-checkbox>
        <jilsati-checkbox :postfix="idPostfix" :checked="properties['celebrations'] === 'on'" name="celebrations">مناسبات</jilsati-checkbox>
        <jilsati-checkbox :postfix="idPostfix" :checked="properties['jacuzzi'] === 'on'" name="jacuzzi">جاكوزي</jilsati-checkbox>
        <jilsati-checkbox :postfix="idPostfix" :checked="properties['kitchen'] === 'on'" name="kitchen">مطبخ</jilsati-checkbox>
    </div>
</template>

<script>
    export default {
        props : {
            properties : {
                required : true,
            },

            idPostfix : ''
        },
    }
</script>