<template>
    <div>
        <jilsati-checkbox :checked="properties['families']" name="families">عائلات</jilsati-checkbox>
        <jilsati-checkbox :checked="properties['guys']" name="guys">شباب</jilsati-checkbox>
        <jilsati-checkbox :checked="properties['pool']" name="pool">مسبح</jilsati-checkbox>
        <jilsati-checkbox :checked="properties['women-pool']" name="women-pool">مسبح نساء</jilsati-checkbox>
        <jilsati-checkbox :checked="properties['kids-pool']" name="kids-pool">مسبح اطفال</jilsati-checkbox>
        <jilsati-checkbox :checked="properties['playground']" name="playground">ملعب</jilsati-checkbox>
        <jilsati-checkbox :checked="properties['women-section']" name="women-section">قسم نساء منفصل</jilsati-checkbox>
        <jilsati-checkbox :checked="properties['tv']" name="tv">تلفزيون</jilsati-checkbox>
        <jilsati-checkbox :checked="properties['wifi']" name="wifi">واي فاي</jilsati-checkbox>
        <jilsati-checkbox :checked="properties['garden']" name="garden">حديقة</jilsati-checkbox>
        <jilsati-checkbox :checked="properties['air-condition']" name="air-condition">مكيفة</jilsati-checkbox>
        <jilsati-checkbox :checked="properties['celebrations']" name="celebrations">مناسبات</jilsati-checkbox>
        <jilsati-checkbox :checked="properties['jacuzzi']" name="jacuzzi">جاكوزي</jilsati-checkbox>
        <jilsati-checkbox :checked="properties['kitchen']" name="kitchen">مطبخ</jilsati-checkbox>
    </div>
</template>

<script>
    import JilsatiCheckbox from './jilsati-checkbox'

    export default {
        components : {JilsatiCheckbox},

        props : {
            properties : {
                required : true,
            }
        },
    }
</script>