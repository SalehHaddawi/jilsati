@extends('layouts.layout')

@section('title','جلستي: اضف جلستك/استراحتك')

@inject('input', '\Illuminate\Support\Facades\Input')

@section('body')
<div dir="rtl" class="container">
    <div class="mb-5 jumbotron rounded-0 shadow-sm bg-light">
        <jilsati-alert class="mx-auto" type="info">عشرة خطوات سهلة عشان تضيف جلستك/استراحتك</jilsati-alert>

        <ul class="list-group">
            <jilsati-add-jilsah-collapse number="1" id="info" name="معلومات الجلسة">
                <div class="form-group">
                    <form>
                        <label for="in1">نةنةت</label>
                        <label for="in2">مخنخم</label>
                        <input id="in1" type="email" class="form-control">
                        <input id="in2" type="email" class="form-control">
                    </form>
                </div>
            </jilsati-add-jilsah-collapse>

            <jilsati-add-jilsah-collapse number="2" id="options" name="خيارات الجلسة">
                <div class="form-group">
                    <form>
                        <label for="in1">نةنةت</label>
                        <label for="in2">مخنخم</label>
                        <input id="in1" type="email" class="form-control">
                        <input id="in2" type="email" class="form-control">
                    </form>
                </div>
            </jilsati-add-jilsah-collapse>
        </ul>
    </div>
</div>

<div class="container bg-light jumbotron">
    <div>
        <jilsati-step dir="rtl" v-for="i in 5" :key="i"
                      :id="'step_' + i"
                      :rtl="true"
                      :number="i"
                      :title="'الخطوة رقم ' + i">
            لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار  النشوة وتمجيد الألم نشأت بالفعل، وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب الشعور بالسعادة، ولكن بفضل هؤلاء الأشخاص الذين لا يدركون بأن السعادة لا بد أن نستشعرها بصورة أكثر عقلانية ومنطقية فيعرضهم هذا لمواجهة الظروف الأليمة، وأكرر بأنه لا يوجد من يرغب في الحب ونيل المنال ويتلذذ بالآلام، الألم هو الألم ولكن نتيجة لظروف ما قد تكمن السعاده فيما نتحمله من كد وأسي.

            و سأعرض مثال حي لهذا، من منا لم يتحمل جهد بدني شاق إلا من أجل الحصول على ميزة أو فائدة؟ ولكن من لديه الحق أن ينتقد شخص ما أراد أن يشعر بالسعادة التي لا تشوبها عواقب أليمة أو آخر أراد أن يتجنب الألم الذي ربما تنجم عنه بعض المتعة ؟
            علي الجانب الآخر نشجب ونستنكر هؤلاء الرجال المفتونون بنشوة اللحظة الهائمون في رغباتهم فلا يدركون ما يعقبها من الألم والأسي المحتم، واللوم كذلك يشمل هؤلاء الذين أخفقوا في واجباتهم نتيجة لضعف إرادتهم فيتساوي مع هؤلاء الذين يتجنبون وينأون عن تحمل الكدح والألم .
        </jilsati-step>
    </div>
</div>

@endsection