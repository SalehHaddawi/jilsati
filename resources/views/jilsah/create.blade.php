@extends('layouts.layout')

@section('title','جلستي: اضيف جلستك')

@inject('input', '\Illuminate\Support\Facades\Input')

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/ekko-lightbox.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
@endsection

@section('body')
<div dir="rtl" class="container">
    <div class="mb-5 jumbotron rounded-0 shadow-sm bg-light">
        <jilsati-alert class="mx-auto" type="info">سبعة خطوات سهلة عشان تضيف جلستك</jilsati-alert>

        <div class="mt-5">
            <form>
                <jilsati-stepper></jilsati-stepper>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="{{asset('js/moment.js')}}"></script>
    <script src="{{asset('js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{asset('js/ekko-lightbox.js')}}"></script>
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>
@endsection