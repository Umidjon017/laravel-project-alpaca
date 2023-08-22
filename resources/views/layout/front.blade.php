<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('front/assets/icon.png') }}">

    <title>{{ $title ?? config('app.name', 'Alpaca') }}</title>
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('front/style/css/style.css') }}">
    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>
<!--bodyni classiga " rtl__on " qoshiladi-->
<body class="">

{{ $navbar }}

<!-- Container Start -->
<div class="container">

    {{ $slot }}

</div>
<!-- Container End -->

{{ $footer }}


<script src="{{ asset('front/js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
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