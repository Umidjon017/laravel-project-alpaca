@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
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
                                            <p>{!! $page->getTranslatedAttributes($locale->id)->title !!}</p>
                                            <hr>
                                            <h6 class="mb-1">Content</h6>
                                            <p>{!! $page->getTranslatedAttributes($locale->id)->content !!}</p>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="mt-3">
                                    <h6>Status</h6>
                                    <p>
                                        @if ($page->status == true)
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
                                        <h6 class="card-title"> Info block {{ $loop->iteration }} </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="example">
                                            <div>
                                                <h6> Title </h6>
                                                <p class="mb-1"> {!! $info->getTranslatedAttributes($locale->id)->title !!} </p>
                                            </div>

                                            <hr>

                                            <div>
                                                <h6> Description </h6>
                                                <p class="mb-1"> {!! $info->getTranslatedAttributes($locale->id)->description !!} </p>
                                            </div>

                                            <hr>

                                            <div>
                                                <h6> Body </h6>
                                                <p class="mb-1"> {!! $info->getTranslatedAttributes($locale->id)->body !!} </p>
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

                                    <hr>

                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1"> Add Info block </h6>
                                        <a href="{{ route('admin.infos.create', $page->id) }}" class="btn btn-primary">Add</a>
                                    </div>
                                    @include('admin.pages.gallery.create')
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
@endpush
