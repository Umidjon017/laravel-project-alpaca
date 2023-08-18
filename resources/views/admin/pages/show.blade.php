@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
@endpush

@push('style')
    <link rel="stylesheet" href="{{ asset('front/style/css/video.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
@endpush

@section('content')
    @include('admin.partials.breadcrumb', ['subPage'=>'Посмотреть', 'page'=>'Проектов', 'pageUrl'=>route('admin.pages.index')])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Page ID: {{ $page->id }}</h6>

                    {{-- Page start --}}
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title"> Page {{ $page->getTranslatedAttributes(session('locale_id'))->title }} </h6>
                        </div>
                        <div class="card-body">
                            <div class="example">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @foreach($localizations as $localization)
                                        <li class="nav-item">
                                            <a class="nav-link @if($loop->first) active @endif" id="{{ $localization->name }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $localization->name }}" role="tab" aria-controls="{{ $localization->name }}" aria-selected="true">{{ strtoupper($localization->name) }}</a>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="tab-content border border-top-0 p-3" id="myTabContent">
                                    @foreach ($localizations as $locale)
                                        <div class="tab-pane fade @if($loop->first) show active @endif" id="{{ $locale->name }}" role="tabpanel" aria-labelledby="{{ $locale->name }}-tab">
                                            <h6 class="mb-1">Title</h6>
                                            <p>{!! $page->getTranslatedAttributes($locale->id)->title ?? ' ' !!}</p>
                                            <hr>
                                            <h6 class="mb-1">Content</h6>
                                            <p>{!! $page->getTranslatedAttributes($locale->id)->content ?? ' ' !!}</p>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="mt-3">
                                    <h6>Status</h6>
                                    <p>
                                        @if ($page->status == 1)
                                            <span class="badge bg-success"> {{ __('Active') }} </span>
                                        @else
                                            <span class="badge bg-danger"> {{ __('Inactive') }} </span>
                                        @endif
                                    </p>
                                </div>

                                <hr>

                                <div>
                                    <h6 class="mb-1">Image</h6>
                                    <img src="{{ asset(page_file_path().$page->image) }}" alt="" width="100">
                                </div>

                                <hr>

                                <div>
                                    <h6 class="mb-1">Slug</h6>
                                    <p>{{ $page->slug }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Page end --}}

                    {{-- Gallery block start --}}
                    <div class="card mt-3">
                        <div class="card-header">
                            <h6 class="card-title"> Gallery block </h6>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                @foreach ($galleries as $gallery)
                                    <div class="me-3">
                                        <h6 class="mb-1">Image</h6>
                                        <img src="{{ asset(gallery_file_path().$gallery->images) }}" alt="" width="200">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{-- Gallery block end --}}

                    {{-- Info Block start --}}
                    <div class="raw">
                        <div class="d-flex justify-content-evenly">
                            @foreach ($infos as $info)
                            <div class="col-5">
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h6>Info block {{ $loop->iteration }}</h6>
                                            <form action="{{ route('admin.infos.destroy', $info->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm float-end ms-2">Delete</button>
                                            </form>
                                            <a href="{{ route('admin.infos.edit', $info->id) }}" class="btn btn-success btn-sm float-end text-capitalize">Edit</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="example">
                                            <div>
                                                <h6> Title </h6>
                                                <p class="mb-1"> {!! $info->getTranslatedAttributes(session('locale_id'))->title !!} </p>
                                            </div>

                                            <hr>

                                            <div>
                                                <h6> Description </h6>
                                                <p class="mb-1"> {!! $info->getTranslatedAttributes(session('locale_id'))->description !!} </p>
                                            </div>

                                            <hr>

                                            <div>
                                                <h6> Body </h6>
                                                <p class="mb-1"> {!! $info->getTranslatedAttributes(session('locale_id'))->body !!} </p>
                                            </div>

                                            <hr>

                                            <div>
                                                <h6> Link </h6>
                                                <p class="mb-1"> {!! $info->link !!} </p>
                                            </div>

                                            <hr>

                                            <div class="me-3">
                                                <h6 class="mb-1">Image</h6>
                                                <img src="{{ asset(info_file_path().$info->image) }}" alt="" width="200">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- Info Block end --}}

                    {{-- Comment Block start --}}
                    <div class="raw">
                        <div class="d-flex justify-content-evenly flex-wrap">
                            @foreach ($comments as $comment)
                                <div class="col-5">
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h6>Comment block {{ $loop->iteration }}</h6>
                                                <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm float-end ms-2">Delete</button>
                                                </form>
                                                <a href="{{ route('admin.comments.edit', $comment->id) }}" class="btn btn-success btn-sm float-end text-capitalize">Edit</a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="example">
                                                <div>
                                                    <h6> Full name </h6>
                                                    <p class="mb-1"> {!! $comment->getTranslatedAttributes(session('locale_id'))->full_name !!} </p>
                                                </div>

                                                <hr>

                                                <div>
                                                    <h6> Position </h6>
                                                    <p class="mb-1"> {!! $comment->getTranslatedAttributes(session('locale_id'))->position !!} </p>
                                                </div>

                                                <hr>

                                                <div>
                                                    <h6> Text </h6>
                                                    <p class="mb-1"> {!! $comment->getTranslatedAttributes(session('locale_id'))->text !!} </p>
                                                </div>

                                                <hr>

                                                <div class="me-3">
                                                    <h6 class="mb-1">Logo</h6>
                                                    <img src="{{ asset(comment_file_path().$comment->logo) }}" alt="" width="200">
                                                </div>

                                                <hr>

                                                <div class="me-3">
                                                    <h6 class="mb-1">Image</h6>
                                                    <img src="{{ asset(comment_file_path().$comment->image) }}" alt="" width="200">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- Comment Block end --}}

                    {{-- Text Block start --}}
                    <div class="raw">
                        <div class="d-flex justify-content-evenly">
                            @foreach ($texts as $text)
                                <div class="col-5">
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h6>Text block {{ $loop->iteration }}</h6>
                                                <form action="{{ route('admin.texts.destroy', $text->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm float-end ms-2">Delete</button>
                                                </form>
                                                <a href="{{ route('admin.texts.edit', $text->id) }}" class="btn btn-success btn-sm float-end text-capitalize">Edit</a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="example">
                                                <div>
                                                    <h6> Text </h6>
                                                    <p class="mb-1"> {!! $text->getTranslatedAttributes(session('locale_id'))->text !!} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- Text Block end --}}

                    {{-- Video Player start --}}
                    <div class="raw">
                        <div class="d-flex justify-content-evenly flex-wrap">
                            @foreach ($videos as $video)
                            <div class="col-5">
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h6>Video Player {{ $loop->iteration }}</h6>
                                            <form action="{{ route('admin.videos.destroy', $video->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm float-end ms-2">Delete</button>
                                            </form>
                                            <a href="{{ route('admin.videos.edit', $video->id) }}" class="btn btn-success btn-sm float-end text-capitalize"> Edit </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="video__container inner__container">
                                            <div class="video-element">
                                                <div class="video-cover"><i class="fas fa-play"></i></div>
                                                <video class="my-video" poster="{{ asset(videos_file_path().$video->video_poster) ?? asset('front/assets/image/video_poster.png') }}">
                                                    <source src="{{ $video->video_url }}">
                                                </video>
                                                <div class="control-box">
                                                    <button class="play-pause">
                                                        {{-- <img src="{{ asset('front/assets/image/play_icon.svg') }}" alt=""> --}}
                                                        <i class="fas fa-play"></i>
                                                    </button>
                                                    <div class="completed-track"></div>
                                                    <input type="range" min="0" max="100" step="0.001" class="progress-slider" value="0">
                                                    <div class="time-duration">00:00/00:00</div>
                                                    <button class="full-screen"><i class="fas fa-expand"></i></button>
                                                    <button class="mute-button"><i class="fas fa-volume-up"></i></button>
                                                    <input type="range" min="0" max="1" step="0.1" class="volume-button" value="1" />
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
                    {{-- Video Player end --}}

                    {{-- Add Other Blocks start --}}
                    <div class="raw">
                        <div class="col-6">
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h6 class="card-title"> Add other blocks </h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1"> Add Gallery block </h6>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGallery">Add</button>
                                    </div>
                                    @include('admin.pages.gallery.create')

                                    <hr>

                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1"> Add Info block </h6>
                                        <a href="{{ route('admin.infos.create', $page->slug) }}" class="btn btn-primary">Add</a>
                                    </div>

                                    <hr>

                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1"> Add Comment block </h6>
                                        <a href="{{ route('admin.comments.create', $page->slug) }}" class="btn btn-primary">Add</a>
                                    </div>

                                    <hr>

                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1"> Add Text block </h6>
                                        <a href="{{ route('admin.texts.create', $page->slug) }}" class="btn btn-primary">Add</a>
                                    </div>

                                    <hr>

                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1"> Add Video Player block </h6>
                                        <a href="{{ route('admin.videos.create', $page->slug) }}" class="btn btn-primary"> Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Add Other Blocks end --}}

                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/dropify.js') }}"></script>
    <script src="{{ asset('front/js/script.js') }}"></script>
    <script src="{{ asset('front/js/video.js') }}"></script>
@endpush
