<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('front/assets/icon.png') }}">

    <title>{{ $title ?? config('app.name', 'Alpaca') }}</title>
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('front/style/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/style/css/video.css') }}">

    @stack('css')

    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    @stack('custom-css')

</head>
<!--bodyni classiga " rtl__on " qoshiladi-->
<body class="@if(\Illuminate\Support\Facades\App::getLocale() == '2') rtl__on @endif" @if(request()->routeIs('home.page*')) id="other__pages" @endif>

{{ $navbar }}

<!-- Container Start -->
<div class="container">

    {{ $slot }}

</div>
<!-- Container End -->

{{ $footer }}


<script src="{{ asset('front/js/script.js') }}"></script>
<script src="{{ asset('front/js/video.js') }}"></script>

@stack('js')

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

@stack('custom-js')

<script>
    var swiper = new Swiper(".innerSwiper", {
            navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
            pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 40,
        // pagination: {
        //   el: ".swiper-pagination",
        //   clickable: true,
        // },
        // loop: true,
        // autoplay: {
        //   delay: 2500,
        //   disableOnInteraction: false,
        // },
        breakpoints: {
            10:{
                slidesPerView: 1,
                spaceBetween: 10,
                centeredSlides: true,
            },
            730: {
                slidesPerView: 1.7,
                spaceBetween: 20,
            },
            940: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1250: {
                slidesPerView: 2.5,
                spaceBetween: 30,
            },
            1750: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
        },
    });
</script>

</body>
</html>
