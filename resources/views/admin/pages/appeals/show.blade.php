@extends('layout.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('front/style/css/video.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
@endpush

@section('content')
    @foreach($appeals as $appeal) @endforeach

    @include('admin.partials.breadcrumb', [
        'subPage'=>'Посмотреть',
        'page'=>'Страницы',
        'pageUrl'=>route('admin.pages.index'),

        'subPage2'=>'page_id',
        'page2'=>$appeal->page->translatable()->title,
        'pageUrl2'=>route('admin.pages.show', $appeal->page_id)
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ __('Название страницы:') }} {!! $appeal->page->translatable()->title !!}</h6>

                    <div class="raw">
                        <div class="d-flex justify-content-evenly flex-wrap">
                            @foreach ($appeals as $appeal)
                                <div class="col-5">
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h6>{{ __('Блок заявки') }} {{ $loop->iteration }}</h6>
                                                <form action="{{ route('admin.appeals.destroy', $appeal->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm float-end ms-2">
                                                        {{ __('Удалить') }}
                                                    </button>
                                                </form>
                                                <a href="{{ route('admin.appeals.edit', $appeal->id) }}"
                                                   class="btn btn-success btn-sm float-end text-capitalize">{{ __('Редактировать') }}</a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="example">
                                                <div>
                                                    <h6> {{ __('Заголовок') }} </h6>
                                                    <p class="mb-1"> {!! $appeal->translatable()->title !!} </p>
                                                </div>

                                                <hr>

                                                <div>
                                                    <h6> {{ __('Описание') }} </h6>
                                                    <p class="mb-1"> {!! $appeal->translatable()->description !!} </p>
                                                </div>

                                                <hr>

                                                <div>
                                                    <h6> {{ __('Тема заявления') }} </h6>
                                                    <p class="mb-1"> {!! $appeal->translatable()->theme !!} </p>
                                                </div>

                                                <hr>

                                                <div>
                                                    <h6> {{ __('Электронная почта') }} </h6>
                                                    <p class="mb-1"> {!! $appeal->translatable()->email !!} </p>
                                                </div>

                                                <hr>

                                                <div>
                                                    <h6> {{ __('Имя') }} </h6>
                                                    <p class="mb-1"> {!! $appeal->translatable()->name !!} </p>
                                                </div>

                                                <hr>

                                                <div>
                                                    <h6> {{ __('Комментарий') }} </h6>
                                                    <p class="mb-1"> {!! $appeal->translatable()->comment !!} </p>
                                                </div>

                                                <hr>

                                                <div>
                                                    <h6> {{ __('Имя ссылки') }} </h6>
                                                    <p class="mb-1"> {!! $appeal->translatable()->link !!} </p>
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
