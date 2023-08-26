@extends('layout.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('front/style/css/video.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
@endpush

@section('content')
    @foreach($directSpeeches as $directSpeech) @endforeach

    @include('admin.partials.breadcrumb', [
        'subPage'=>'Посмотреть',
        'page'=>'Страницы',
        'pageUrl'=>route('admin.pages.index'),

        'subPage2'=>'page_id',
        'page2'=>$directSpeech->page_id,
        'pageUrl2'=>route('admin.pages.show', $directSpeech->page_id)
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ __('Идентификатор страницы:') }} {{ $directSpeech->page_id }}</h6>

                    <div class="raw">
                        <div class="d-flex justify-content-evenly flex-wrap">
                            @foreach ($directSpeeches as $directSpeech)
                                <div class="col-5">
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h6>{{__('Блок прямой речи')}} {{ $loop->iteration }}</h6>
                                                <form action="{{ route('admin.direct_speech.destroy', $directSpeech->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm float-end ms-2">
                                                        {{ __('Удалить') }}
                                                    </button>
                                                </form>
                                                <a href="{{ route('admin.direct_speech.edit', $directSpeech->id) }}"
                                                   class="btn btn-success btn-sm float-end text-capitalize">{{ __('Редактировать') }}</a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="example">
                                                <div>
                                                    <h6> {{ __('Полное имя') }} </h6>
                                                    <p class="mb-1"> {!! $directSpeech->translatable()->full_name !!} </p>
                                                </div>

                                                <hr>

                                                <div>
                                                    <h6> {{ __('позиция') }} </h6>
                                                    <p class="mb-1"> {!! $directSpeech->translatable()->position !!} </p>
                                                </div>

                                                <hr>

                                                <div>
                                                    <h6> {{ __('Текст') }} </h6>
                                                    <p class="mb-1"> {!! $directSpeech->translatable()->text !!} </p>
                                                </div>

                                                <hr>

                                                <div class="me-3">
                                                    <h6 class="mb-1">{{ __('Логотип') }}</h6>
                                                    <img src="{{ asset(direct_speech_file_path().$directSpeech->logo) }}" alt=""
                                                         width="200">
                                                </div>

                                                <hr>

                                                <div class="me-3">
                                                    <h6 class="mb-1">{{ __('Изображение') }}</h6>
                                                    <img src="{{ asset(direct_speech_file_path().$directSpeech->image) }}" alt=""
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
