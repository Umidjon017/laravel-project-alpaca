<x-front-layout>

    <x-slot name="title">
        {{ __('Alpaca') }}
    </x-slot>

    <x-slot name="navbar">
        <!-- Navbar Start -->
        @include('layout._front-inc.navbar')
        <!-- Navbar End -->

        <!-- Hero Start -->
        @include('layout._front-inc.hero')
        <!-- Hero End -->
    </x-slot>

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
    @include('layout._front-inc.feedbacks')
    <!-- Comments End -->

    <!-- Partners Start -->
    @include('layout._front-inc.partners')
    <!-- Partners End -->

    <!-- Use-now Start -->
    @include('layout._front-inc.use-now')
    <!-- Use-now End -->

    <x-slot name="footer">
        <!-- Footer Start -->
        @include('layout._front-inc.footer')
        <!-- Footer End -->
    </x-slot>

</x-front-layout>
