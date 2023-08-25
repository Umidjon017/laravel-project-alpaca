@extends('layout.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('front/style/css/video.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
@endpush

@section('content')
    @include('admin.partials.breadcrumb', ['subPage'=>'Посмотреть', 'page'=>'Страницы', 'pageUrl'=>route('admin.pages.index')])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ __('Идентификатор страницы:') }} {{ $page->id }}</h6>

                    {{-- Page start --}}
                    @include('admin.pages._show_incs.page')
                    {{-- Page end --}}

                    {{-- Info Block start --}}
                    @include('admin.pages._show_incs.info')
                    {{-- Info Block end --}}

                    {{-- Comment Block start --}}
                    @include('admin.pages._show_incs.comment')
                    {{-- Comment Block end --}}

                    {{-- Our Client Block start --}}
                    @include('admin.pages._show_incs.our-client')
                    {{-- Our Client Block end --}}

                    {{-- Text Block start --}}
                    @include('admin.pages._show_incs.text')
                    {{-- Text Block end --}}

                    {{-- Checkbox Block start --}}
                    @include('admin.pages._show_incs.checkbox-block')
                    {{-- Checkbox Block end --}}

                    {{-- Gallery block start --}}
                    @include('admin.pages._show_incs.gallery')
                    {{-- Gallery block end --}}

                    {{-- Video Player start --}}
                    @include('admin.pages._show_incs.video-player')
                    {{-- Video Player end --}}

                    {{-- Direct Speech Block start --}}
                    @include('admin.pages._show_incs.direct-speech')
                    {{-- Direct Speech Block end --}}

                    {{-- Appeal Block start --}}
                    @include('admin.pages._show_incs.appeal')
                    {{-- Appeal Block end --}}

                    {{-- Appeal Block start --}}
                    @include('admin.pages._show_incs.recommendation-block')
                    {{-- Appeal Block end --}}

                    {{-- Add Other Blocks start --}}
                    @include('admin.pages._show_incs.add-other-blocks')
                    {{-- Add Other Blocks end --}}

                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script src="{{ asset('assets/js/dropify.js') }}"></script>
    <script src="{{ asset('front/js/script.js') }}"></script>
    <script src="{{ asset('front/js/video.js') }}"></script>
@endpush
