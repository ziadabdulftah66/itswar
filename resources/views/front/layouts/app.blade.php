<!DOCTYPE html>
<html lang="en" >
<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>  <?php $site_name=\App\Models\General_setting::select('site_name')->first() ?> {{ $site_name->site_name}} </title>
    <!-- Bootstrap font-aweasome css -->
        <link rel="icon" <?php  $site_name=\App\Models\General_setting::select('site_logo_icon','opening_words','Tags')->first() ?> href="{{$site_name->site_logo_icon}}"  type="image/png">
    <meta name="description" content="{{$site_name->Tags}}">
    <meta name="keywords" content="{{$site_name->opening_words}}">
    <link href="{{asset('public/front/font-awesome/css/all.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('public/front/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/style.css')}}"/>

    <!--=============== Swiper ===============-->
    <script src="{{asset('public/front/css/intro.js')}}"></script>
    <script src="{{asset('public/front/css/swiper-bundle.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('public/front/css/steps.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/front/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/responsive.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/front/css/owl.carousel.css')}}"/>

    <link rel="stylesheet" href="{{asset('public/front/css/jquery.fancybox.css')}}">




    @yield('style')
    @livewireStyles
    <!-- Google tag (gtag.js) -->
</head>
<body>


@include('front.layouts.header')

@yield('content')


@include('front.layouts.footer')




<script src="{{asset('public/front/js/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('public/front/js/popper.min.js')}}"></script>
<!--=============== Swiper ===============-->
<script src="{{asset('public/front/js/swiper-bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('public/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/front/js/wow.min.js')}}"></script>

<script>new WOW().init();</script>
<script src="{{asset('public/front/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('public/front/js/script.js')}}"></script>
{{--<script src="{{asset('public/front/js/intro.js')}}"></script>--}}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
{{--<script src="{{asset('public/front/js/main.js?version=1.8')}}"></script>--}}


@yield('scripts')

@livewireScripts
</body>
</html>
