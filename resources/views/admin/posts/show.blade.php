@extends('layout.master')

@section('content')
  @include('admin.partials.breadcrumb', ['subPage'=>'Посмотреть', 'page'=>'Новости', 'pageUrl'=>route('admin.posts.index')])

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Новость ID: {{ $post->id }}</h6>
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
                <p>{{ $post->getTranslatedAttributes($locale->id)->title }}</p>
                <hr>
                <h6 class="mb-1">Описание</h6>
                <p>{{ $post->getTranslatedAttributes($locale->id)->description }}</p>
                <hr>
                <h6 class="mb-1">Контент</h6>
                <p>{!! $post->getTranslatedAttributes($locale->id)->body !!}</p>
              </div>
            @endforeach
            </div>
            <hr>
            <h6 class="mb-1">Проекты</h6>
              @foreach($post->projects as $project)
                  <ul>
                      <li> {!! $project->getTranslatedAttributes(1)->name !!} </li>
                  </ul>
              @endforeach
            <hr>
            <div>
                <h6 class="mb-1">Фото</h6>
                <img src="{{ post_file_path().$post->image }}" alt="" width="400">
            </div>
            <hr>
            <div>
                <h6 class="mb-1">Slug</h6>
                <p>{{ $post->slug }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
