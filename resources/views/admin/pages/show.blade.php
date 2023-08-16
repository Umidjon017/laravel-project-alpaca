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
                    <h6 class="card-title">Проект ID: {{ $page->id }}</h6>
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
                        <hr>
                        <div>
                            <h6 class="mb-1">Status</h6>
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
                            <h6 class="mb-1">Image (Page)</h6>
                            <img src="{{ asset(page_file_path().$page->image) }}" alt="" width="100">
                            <hr>
                        </div>
                        <hr>
                        <div>
                            <h6 class="mb-1">Slug</h6>
                            <p>{{ $page->slug }}</p>
                        </div>
                    </div>

                    <hr>

                    @foreach ($galleries as $gallery)
                        <h6 class="mb-1">Images (Gallery)</h6>
                        <img src="{{ asset(gallery_file_path().$gallery->images) }}" alt="" width="100">
                        <hr>
                    @endforeach

                    <hr>

                    <div class="raw">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1"> Add Informations page </h6>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addInformation">Add</button>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1"> Add Gallery page </h6>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGallery">Add</button>
                            </div>

                            @include('admin.pages.gallery.create')
                        </div>
                    </div>
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
