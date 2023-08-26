@extends('layout.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('front/style/css/video.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
@endpush

@section('content')
    @foreach($comments as $comment) @endforeach

    @include('admin.partials.breadcrumb', [
        'subPage'=>'Посмотреть',
        'page'=>'Страницы',
        'pageUrl'=>route('admin.pages.index'),

        'subPage2'=>'page_id',
        'page2'=>$comment->page_id,
        'pageUrl2'=>route('admin.pages.show', $comment->page_id)
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ __('Идентификатор страницы:') }} {{ $comment->page_id }}</h6>

                    <div class="raw">
                        <div class="d-flex justify-content-evenly flex-wrap">
                            @foreach ($comments as $comment)
                                <div class="col-3">
                                    <div class="card mt-3 me-3">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h6> {{ __('Блок комментариев') }} {{ $loop->iteration }}</h6>
                                                <form action="{{ route('admin.comments.destroy', $comment->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm float-end ms-2">
                                                        {{ __('Удалить') }}
                                                    </button>
                                                </form>
                                                <a href="{{ route('admin.comments.edit', $comment->id) }}"
                                                   class="btn btn-success btn-sm float-end text-capitalize">{{ __('Редактировать') }}</a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="example">
                                                <div>
                                                    <h6> {{ __('Полное имя') }} </h6>
                                                    <p class="mb-1"> {!! $comment->translatable()->full_name !!} </p>
                                                </div>

                                                <hr>

                                                <div>
                                                    <h6> {{ __('позиция') }} </h6>
                                                    <p class="mb-1"> {!! $comment->translatable()->position !!} </p>
                                                </div>

                                                <hr>

                                                <div>
                                                    <h6> {{ __('Текст') }} </h6>
                                                    <p class="mb-1"> {!! $comment->translatable()->text !!} </p>
                                                </div>

                                                <hr>

                                                <div class="me-3">
                                                    <h6 class="mb-1">{{ __('Логотип') }}</h6>
                                                    <img src="{{ asset(comment_file_path().$comment->logo) }}" alt=""
                                                         width="200">
                                                </div>

                                                <hr>

                                                <div class="me-3">
                                                    <h6 class="mb-1">{{ __('Изображение') }}</h6>
                                                    <img src="{{ asset(comment_file_path().$comment->image) }}" alt=""
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
