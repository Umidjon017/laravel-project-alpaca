@extends('layout.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('front/style/css/video.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
@endpush

@section('content')
    @include('admin.partials.breadcrumb', ['subPage'=>'Посмотреть', 'page'=>'Страницы', 'pageUrl'=>route('admin.pages.index')])

    <div class="row">

        <div class="col-6">
            {{-- Page start --}}
            @include('admin.pages._show_incs.page')
            {{-- Page end --}}
        </div>

        <div class="col-6">
            {{-- Add Other Blocks start --}}
            @include('admin.pages._show_incs.add-other-blocks')
            {{-- Add Other Blocks end --}}
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script src="{{ asset('assets/js/dropify.js') }}"></script>
    <script src="{{ asset('front/js/script.js') }}"></script>
    <script src="{{ asset('front/js/video.js') }}"></script>
@endpush
