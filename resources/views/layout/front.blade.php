<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('front/assets/icon.png') }}">
    <title>Alpaca</title>
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('front/style/css/style.css') }}">
    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>
<!--bodyni classiga " rtl__on " qoshiladi-->
<body class="">

<!-- Navbar Start -->
@include('layout._front-inc.navbar')
<!-- Navbar End -->

<!-- Hero Start -->
@include('layout._front-inc.hero')
<!-- Hero End -->

<!-- Container Start -->
<div class="container">

    <!-- Project-carousel Start -->
    @include('layout._front-inc.project-carousel')
    <!-- Project-carousel End -->

    <!-- Philosophy Start -->
    @include('layout._front-inc.philosophy')
    <!-- Philosophy End -->

    <div class="for__card__container">
        <!-- For Doctors Start -->
        @include('layout._front-inc.for-doctors')
        <!-- For Doctors End -->

        <!-- For Leader Start -->
        @include('layout._front-inc.for-leader')
        <!-- For Leader End -->

        <!-- For IT Start -->
        @include('layout._front-inc.for-it-star')
        <!-- For IT End -->

        <!-- For Marketology Start -->
        @include('layout._front-inc.for-marketology')
        <!-- For Marketology End -->
    </div>
    <!--  -->

    <!-- Comments Start -->
    @include('layout._front-inc.comments')
    <!-- Comments End -->

    <!-- Partners Start -->
    @include('layout._front-inc.partners')
    <!-- Partners End -->

    <!-- Use-now Start -->
    @include('layout._front-inc.use-now')
    <!-- Use-now End -->
</div>
<!-- Container End -->

<!-- Footer Start -->
@include('layout._front-inc.footer')
<!-- Footer End -->


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
