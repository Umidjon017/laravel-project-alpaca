@extends('layout.master')

@push('style')
    <link rel="stylesheet" href="{{ asset('front/style/css/video.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
@endpush

@section('content')
    @foreach($videos as $video) @endforeach

    @include('admin.partials.breadcrumb', [
        'subPage'=>'Посмотреть',
        'page'=>'Страницы',
        'pageUrl'=>route('admin.pages.index'),

        'subPage2'=>'page_id',
        'page2'=>$video->page->translatable()->title,
        'pageUrl2'=>route('admin.pages.show', $video->page_id)
    ])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ __('Название страницы:') }} {!! $video->page->translatable()->title !!}</h6>

                    <div class="raw">
                        <div class="d-flex justify-content-evenly flex-wrap">
                            @foreach ($videos as $video)
                                <div class="col-5">
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h6>{{ __('Видео проигрыватель') }} {{ $loop->iteration }}</h6>
                                                <form action="{{ route('admin.videos.destroy', $video->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm float-end ms-2">
                                                        {{ __('Удалить') }}
                                                    </button>
                                                </form>
                                                <a href="{{ route('admin.videos.edit', $video->id) }}"
                                                   class="btn btn-success btn-sm float-end text-capitalize"> {{ __('Редактировать') }} </a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="video__container inner__container">
                                                <div class="video-element">
                                                    <div class="video-cover"><i class="fas fa-play"></i></div>
                                                    <video class="my-video"
                                                           poster="{{ asset(videos_file_path().$video->video_poster) ?? asset('front/assets/image/video_poster.png') }}">
                                                        <source src="{{ $video->video_url }}">
                                                    </video>
                                                    <div class="control-box">
                                                        <button class="play-pause">
                                                            {{-- <img src="{{ asset('front/assets/image/play_icon.svg') }}" alt=""> --}}
                                                            <i class="fas fa-play"></i>
                                                        </button>
                                                        <div class="completed-track"></div>
                                                        <input type="range" min="0" max="100" step="0.001"
                                                               class="progress-slider" value="0">
                                                        <div class="time-duration">00:00/00:00</div>
                                                        <button class="full-screen"><i class="fas fa-expand"></i>
                                                        </button>
                                                        <button class="mute-button"><i class="fas fa-volume-up"></i>
                                                        </button>
                                                        <input type="range" min="0" max="1" step="0.1"
                                                               class="volume-button" value="1"/>
                                                        <div class="present-volume"></div>
                                                    </div>
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
