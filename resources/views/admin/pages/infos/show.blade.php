@extends('layout.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('front/style/css/video.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
@endpush

@section('content')
    @foreach($infos as $info) @endforeach

    @include('admin.partials.breadcrumb', [
        'subPage'=>'Посмотреть',
        'page'=>'Страницы',
        'pageUrl'=>route('admin.pages.index'),

        'subPage2'=>'page_id',
        'page2'=>$info->page->translatable()->title,
        'pageUrl2'=>route('admin.pages.show', $info->page_id)
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ __('Название страницы:') }} {!! $info->page->translatable()->title !!}</h6>
                    <div class="raw">
                        <div class="d-flex justify-content-evenly">
                        @foreach ($infos as $info)
                            <div class="col-5">
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h6>{{ __('Информационный блок') }} {{ $loop->iteration }}</h6>
                                            <form action="{{ route('admin.infos.destroy', $info->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm float-end ms-2">
                                                    {{ __('Удалить') }}
                                                </button>
                                            </form>
                                            <a href="{{ route('admin.infos.edit', $info->id) }}"
                                               class="btn btn-success btn-sm float-end text-capitalize">{{ __('Редактировать') }}</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="example">
                                            <div>
                                                <h6> {{ __('Заголовок') }} </h6>
                                                <p class="mb-1"> {!! $info->translatable()->title !!} </p>
                                            </div>

                                            <hr>

                                            <div>
                                                <h6> {{ __('Описание') }} </h6>
                                                <p class="mb-1"> {!! $info->translatable()->description !!} </p>
                                            </div>

                                            <hr>

                                            <div>
                                                <h6> {{ __('Контент') }} </h6>
                                                <p class="mb-1"> {!! $info->translatable()->body !!} </p>
                                            </div>

                                            <hr>

                                            <div>
                                                <h6> {{ __('Название ссылки') }} </h6>
                                                <p class="mb-1"> {!! $info->translatable()->link_title !!} </p>
                                            </div>

                                            <hr>

                                            <div>
                                                <h6> {{ __('Порядок номер блока') }} </h6>
                                                <p class="mb-1"> {!! $info->order_id !!} </p>
                                            </div>

                                            <hr>

                                            <div>
                                                <h6> {{ __('Ссылка') }} </h6>
                                                <p class="mb-1"> {!! $info->link !!} </p>
                                            </div>

                                            <hr>

                                            <div class="me-3">
                                                <h6 class="mb-1">{{ __('Изображение') }}</h6>
                                                <img src="{{ asset(info_file_path().$info->image) }}" alt=""
                                                     width="200">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
