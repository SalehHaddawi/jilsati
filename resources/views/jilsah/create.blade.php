@extends('layouts.layout')

@section('title','جلستي: اضيف جلستك')

@inject('input', '\Illuminate\Support\Facades\Input')

@section('body')
<div dir="rtl" class="container">
    <div class="mb-5 jumbotron rounded-0 shadow-sm bg-light">
        <jilsati-alert class="mx-auto" type="info">عشرة خطوات سهلة عشان تضيف جلستك</jilsati-alert>

        <div class="mt-5">
            <form>
                <jilsati-step dir="rtl"
                              id="jilsah-info"
                              rtl="true"
                              number="1"
                              title="معلومات الجلسة"
                              :status="steps[0]">

                    <div class="form-group">
                        <label for="jilsah-name">اسم الجلسة</label>
                        <input type="text" class="form-control" id="jilsah-name" placeholder="اسم جلستك">
                    </div>
                    <div class="form-group">
                        <label for="jilsah-description">وصف الجلسة</label>
                        <textarea class="form-control" id="jilsah-description" placeholder="الوصف" rows="5"></textarea>
                        <small id="descriptionHelp" class="form-text text-muted">معلومات مفصلة عن جلستك عشان الناس يعرفوا اكثر عنها</small>
                    </div>

                    <button type="button" class="btn btn-success" @click="check(0)">اللي بعدو</button>
                </jilsati-step>
                <jilsati-step dir="rtl"
                              id="jilsah-times"
                              rtl="true"
                              number="2"
                              title="اوقات العمل"
                              :status="steps[1]">

                    <div class="form-group">
                        <label for="jilsah-name">اسم الجلسة</label>
                        <input type="text" class="form-control" id="jilsah-name" placeholder="اسم جلستك">
                    </div>
                    <div class="form-group">
                        <label for="jilsah-description">وصف الجلسة</label>
                        <textarea class="form-control" id="jilsah-description" placeholder="الوصف" rows="5"></textarea>
                        <small id="descriptionHelp" class="form-text text-muted">معلومات مفصلة عن جلستك عشان الناس يعرفوا اكثر عنها</small>
                    </div>

                    <button type="button" class="btn btn-success" @click="check(1)">اللي بعدو</button>
                </jilsati-step>
                <jilsati-step dir="rtl"
                              id="jilsah-options"
                              rtl="true"
                              number="3"
                              title="خصائص الجلسة"
                              :status="steps[2]">

                    <div class="form-group">
                        <label for="jilsah-name">اسم الجلسة</label>
                        <input type="text" class="form-control" id="jilsah-name" placeholder="اسم جلستك">
                    </div>
                    <div class="form-group">
                        <label for="jilsah-description">وصف الجلسة</label>
                        <textarea class="form-control" id="jilsah-description" placeholder="الوصف" rows="5"></textarea>
                        <small id="descriptionHelp" class="form-text text-muted">معلومات مفصلة عن جلستك عشان الناس يعرفوا اكثر عنها</small>
                    </div>

                    <button type="button" class="btn btn-success" @click="check(2)">اللي بعدو</button>
                </jilsati-step>
                <jilsati-step dir="rtl"
                              id="jilsah-price"
                              rtl="true"
                              number="4"
                              title="اسعار الجلسة"
                              :status="steps[3]">

                    <div class="form-group">
                        <label for="jilsah-name">اسم الجلسة</label>
                        <input type="text" class="form-control" id="jilsah-name" placeholder="اسم جلستك">
                    </div>
                    <div class="form-group">
                        <label for="jilsah-description">وصف الجلسة</label>
                        <textarea class="form-control" id="jilsah-description" placeholder="الوصف" rows="5"></textarea>
                        <small id="descriptionHelp" class="form-text text-muted">معلومات مفصلة عن جلستك عشان الناس يعرفوا اكثر عنها</small>
                    </div>

                    <button type="button" class="btn btn-success" @click="check(3)">اللي بعدو</button>
                </jilsati-step>
            </form>
        </div>
    </div>
</div>

@endsection