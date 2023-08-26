@extends('layout.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('front/style/css/video.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
@endpush

@section('content')
    @foreach($texts as $text) @endforeach

    @include('admin.partials.breadcrumb', [
        'subPage'=>'Посмотреть',
        'page'=>'Страницы',
        'pageUrl'=>route('admin.pages.index'),

        'subPage2'=>'page_id',
        'page2'=>$text->page_id,
        'pageUrl2'=>route('admin.pages.show', $text->page_id)
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ __('Идентификатор страницы:') }} {{ $text->page_id }}</h6>

                    <div class="raw">
                        <div class="d-flex justify-content-evenly">
                            @foreach ($texts as $text)
                                <div class="col-5">
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h6>{{ __('Текстовый блок') }} {{ $loop->iteration }}</h6>
                                                <form action="{{ route('admin.texts.destroy', $text->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm float-end ms-2">
                                                        {{ __('Удалить') }}
                                                    </button>
                                                </form>
                                                <a href="{{ route('admin.texts.edit', $text->id) }}"
                                                   class="btn btn-success btn-sm float-end text-capitalize">{{ __('Редактировать') }}</a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="example">
                                                <div class="mb-3">
                                                    <h6> {{ __('Заголовок') }} </h6>
                                                    <p class="mb-1"> {!! $text->translatable()->title !!} </p>
                                                </div>
                                                <div class="mb-3">
                                                    <h6> {{ __('Текст') }} </h6>
                                                    <p class="mb-1"> {!! $text->translatable()->text !!} </p>
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
