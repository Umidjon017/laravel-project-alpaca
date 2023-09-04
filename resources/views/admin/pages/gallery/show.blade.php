@extends('layout.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('front/style/css/video.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
@endpush

@section('content')
    @foreach($galleries as $gallery) @endforeach

    @include('admin.partials.breadcrumb', [
        'subPage'=>'Посмотреть',
        'page'=>'Страницы',
        'pageUrl'=>route('admin.pages.index'),

        'subPage2'=>'page_id',
        'page2'=>$gallery->page->translatable()->title,
        'pageUrl2'=>route('admin.pages.show', $gallery->page_id)
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ __('Название страницы:') }} {!! $gallery->page->translatable()->title !!}</h6>

                    <div class="raw">
                        <div class="d-flex justify-content-evenly flex-wrap">
                            @foreach ($galleries as $gallery)
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h6> {{ __('Блок Галерея') }} {{ $loop->iteration }} </h6>
                                            <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm float-end ms-2">{{ __('Удалить') }}</button>
                                            </form>
                                            <button type="button" class="btn btn-success btn-sm float-end text-capitalize" data-bs-toggle="modal" data-bs-target="#editGallery{{$gallery->id}}">{{ __('Редактировать') }}</button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="me-3">
                                                <h6 class="mb-1">{{ __('Изображение') }}</h6>
                                                <img src="{{ asset(gallery_file_path().$gallery->image) }}" alt="" width="200">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @include('admin.pages.gallery.edit')

                            @endforeach
                        </div>
                    </div>


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
