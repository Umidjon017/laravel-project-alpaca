<div class="raw">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title"> {{ __('Страница -') }} {{ $page->translatable()->title }} </h6>
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
                                <h6 class="mb-1">{{ __('Заголовок') }}</h6>
                                <p>{!! $page->getTranslatedAttributes($locale->id)->title ?? ' ' !!}</p>
                                <hr>
                                <h6 class="mb-1">{{ __('Контент') }}</h6>
                                <p>{!! $page->getTranslatedAttributes($locale->id)->content ?? ' ' !!}</p>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-3">
                        <h6>{{ __('Статус') }}</h6>
                        <p>
                            @if ($page->status == 1)
                                <span class="badge bg-success"> {{ __('Активный') }} </span>
                            @else
                                <span class="badge bg-danger"> {{ __('Неактивный') }} </span>
                            @endif
                        </p>
                    </div>

                    <hr>

                    <div>
                        <h6 class="mb-1">{{ __('Изображение') }}</h6>
                        <img src="{{ asset(page_file_path().$page->image) }}" alt="" width="100">
                    </div>

                    <hr>

                    <div>
                        <h6 class="mb-1">{{ __('Слаг') }}</h6>
                        <p>{{ $page->slug }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
