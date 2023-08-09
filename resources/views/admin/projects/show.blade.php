@extends('layout.master')

@section('content')
    @include('admin.partials.breadcrumb', ['subPage'=>'Посмотреть', 'page'=>'Проектов', 'pageUrl'=>route('admin.projects.index')])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Проект ID: {{ $project->id }}</h6>
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
                                    <h6 class="mb-1">Заголовок</h6>
                                    <p>{!! $project->getTranslatedAttributes($locale->id)->name !!}</p>
                                    <hr>
                                    <h6 class="mb-1">Буклет</h6>
                                    <p>{!! $project->getTranslatedAttributes($locale->id)->booklet !!}</p>
                                    <hr>
                                    <h6 class="mb-1">Контент</h6>
                                    <p>{!! $project->getTranslatedAttributes($locale->id)->body !!}</p>
                                    <hr>
                                    <h6 class="mb-1">Адрес</h6>
                                    <p>{!! $project->getTranslatedAttributes($locale->id)->addres !!}</p>
                                    <hr>
                                    <h6 class="mb-1">Двор</h6>
                                    <p>{!! $project->getTranslatedAttributes($locale->id)->yard_text !!}</p>
                                    <hr>
                                    <h6 class="mb-1">Холлы</h6>
                                    <p>{!! $project->getTranslatedAttributes($locale->id)->hall_text !!}</p>
                                    <hr>
                                    <h6 class="mb-1">Регион проекта</h6>
                                    <p>{!! $project->region->getTranslatedAttributes($locale->id)->name !!}</p>
                                    <hr>
                                    <h6 class="mb-1">Term</h6>
                                    <p>{!! $project->getTranslatedAttributes($locale->id)->term !!}</p>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div>
                            <h6 class="mb-1">Bitrix ID</h6>
                            <p>{!! $project->bitrix_id !!}</p>
                            <hr>
                            <h6 class="mb-1">Этажей(*)</h6>
                            <p>{!! $project->floors !!}</p>
                            <hr>
                            <h6 class="mb-1">Квартир(*)</h6>
                            <p>{!! $project->apartments !!}</p>
                            <hr>
                            <h6 class="mb-1">3D Тур 1</h6>
                            <p>{!! $project->{'3d_tour_one'} !!}</p>
                            <hr>
                            <h6 class="mb-1">3D Тур 2</h6>
                            <p>{!! $project->{'3d_tour_two'} !!}</p>
                            <hr>
                            <h6 class="mb-1">Локация</h6>
                            <p>{!! $project->location !!} &nbsp; или &nbsp; <a href="{{ $project->location }}">нажмите здесь</a> </p>
                            <hr>
                            <h6 class="mb-1">Широта</h6>
                            <p>{!! $project->latitude !!}</p>
                            <hr>
                            <h6 class="mb-1">Долгота</h6>
                            <p>{!! $project->longitude !!}</p>
                            <hr>
                            <h6 class="mb-1">Logo Map</h6>
                            <p>{!! $project->logo_map !!}</p>
                            <hr>
                            <h6 class="mb-1">order</h6>
                            <p>{!! $project->order !!}</p>
                            <hr>
                            <h6 class="mb-1">Статус</h6>
                            <p>{!! $project->status == 1 ? "Текущий" : "Завершенный" !!}</p>
                        </div>
                        <hr>
                        <div>
                            <h6 class="mb-1">Фото(Двор)</h6>
                            <img src="{{ asset(project_file_path().$project->yard_image) }}" alt="" width="400">
                            <hr>
                            <h6 class="mb-1">Фото(Холл)</h6>
                            <img src="{{ asset(project_file_path().$project->hall_image) }}" alt="" width="400">
                            <hr>
                            <h6 class="mb-1">Фото(Background)</h6>
                            <img src="{{ asset(project_file_path().$project->background_image) }}" alt="" width="400">
                            <hr>
                            <h6 class="mb-1">Логотип</h6>
                            <img src="{{ asset(project_file_path().$project->logo) }}" alt="" width="400">
                            <hr>
                            <h6 class="mb-1">Фото(Проекта)</h6>
                            @foreach($project->images as $image)
                            <img src="{{ asset(project_file_path().$image->image) }}" alt="" width="400">
                            @endforeach
                            <hr>
                            <h6 class="mb-1">Видео проекта</h6>
                            @foreach($project->videos as $video)
                            <p>{{ $video->link }}</p>
                            @endforeach
                        </div>
                        <hr>
                        <div>
                            <h6 class="mb-1">Slug</h6>
                            <p>{{ $project->slug }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
