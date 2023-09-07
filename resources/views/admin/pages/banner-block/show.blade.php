@extends('layout.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('front/style/css/video.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
@endpush

@section('content')
    @foreach($bannerBlocks as $bannerBlock) @endforeach

    @include('admin.partials.breadcrumb', [
        'subPage'=>'Посмотреть',
        'page'=>'Страницы',
        'pageUrl'=>route('admin.pages.index'),

        'subPage2'=>'page_id',
        'page2'=>$bannerBlock->page->translatable()->title,
        'pageUrl2'=>route('admin.pages.show', $bannerBlock->page_id)
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ __('Название страницы:') }} {!! $bannerBlock->page->translatable()->title !!}</h6>

                    <div class="raw">
                        <div class="d-flex justify-content-evenly flex-wrap">
                            @foreach ($bannerBlocks as $bannerBlock)
                                <div class="col-6">
                                    <div class="card mt-3 me-3">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h6> {{ __('Блок баннеры') }} {{ $loop->iteration }}</h6>
                                                <form action="{{ route('admin.banner-block.destroy', $bannerBlock->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm float-end ms-2">
                                                        {{ __('Удалить') }}
                                                    </button>
                                                </form>
                                                <a href="{{ route('admin.banner-block.edit', $bannerBlock->id) }}"
                                                   class="btn btn-success btn-sm float-end text-capitalize">{{ __('Редактировать') }}</a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="example">
                                                <div>
                                                    <h6> {{ __('Полное имя') }} </h6>
                                                    <p class="mb-1"> {!! $bannerBlock->translatable()->title !!} </p>
                                                </div>

                                                <hr>

                                                <div>
                                                    <h6> {{ __('позиция') }} </h6>
                                                    <p class="mb-1"> {!! $bannerBlock->translatable()->description !!} </p>
                                                </div>

                                                <hr>

                                                <div>
                                                    <h6> {{ __('Текст') }} </h6>
                                                    <p class="mb-1"> {!! $bannerBlock->translatable()->try_link_title !!} </p>
                                                </div>

                                                <hr>

                                                <div>
                                                    <h6> {{ __('Текст') }} </h6>
                                                    <p class="mb-1"> {!! $bannerBlock->translatable()->more_link_title !!} </p>
                                                </div>

                                                <hr>

                                                <div class="me-3">
                                                    <h6 class="mb-1">{{ __('Порядок номер блока') }}</h6>
                                                    <p class="mb-1"> {!! $bannerBlock->order_id !!} </p>
                                                </div>

                                                <hr>

                                                <div class="me-3">
                                                    <h6 class="mb-1">{{ __('Изображение') }}</h6>
                                                    <img src="{{ asset(banner_block_file_path().$bannerBlock->image) }}" alt=""
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
