<div class="example">
    <ul class="nav nav-tabs " id="myTab" role="tablist">
        @foreach($localizations as $localization)
            <li class="nav-item">
                <a class="nav-link @if($loop->first) active @endif" id="{{ $localization->name }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $localization->name }}" role="tab" aria-controls="{{ $localization->name }}" aria-selected="true">
                    {{ strtoupper($localization->name) }}
                </a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content border border-top-0 p-3" id="myTabContent">
        @foreach ($localizations as $locale)
            <div class="tab-pane fade @if($loop->first) show active @endif" id="{{ $locale->name }}" role="tabpanel" aria-labelledby="{{$locale->name}}-tab">
                <div class="mb-3">
                    <label class="form-label">{{ __('Заголовок') }}(*)</label>
                    <input type="text" name="translations[{{ $locale->id }}][title]" class="form-control @error('translations.*.title') is-invalid @enderror" value="{{ old('translations.*.title') ?? (isset($philosophy) ? $philosophy->getTranslatedAttributes($locale->id)->title : '') }}" placeholder="Введите название" required>
                    @error('translations.*.title')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Описание') }}(*)</label>
                    <textarea class="form-control @error('translations.*.description') is-invalid @enderror" name="translations[{{ $locale->id }}][description]" rows="4"> {{ old('translations.*.description') ?? (isset($philosophy) ? $philosophy->getTranslatedAttributes($locale->id)->description : '') }} </textarea>
                    @error('translations.*.description')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Дополнительный') }}(*)</label>
                    <input class="form-control @error('translations.*.additional') is-invalid @enderror" name="translations[{{ $locale->id }}][additional]" value="{{ old('translations.*.additional') ?? (isset($philosophy) ? $philosophy->getTranslatedAttributes($locale->id)->additional : '') }}" placeholder="Разделяйте дополнительную информацию запятой"/>
                    @error('translations.*.additional')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Название ссылки') }}(*)</label>
                    <input type="text" name="translations[{{ $locale->id }}][link_title]" class="form-control @error('translations.*.link_title') is-invalid @enderror" value="{{ old('translations.1.link_title') ?? (isset($philosophy) ? $philosophy->getTranslatedAttributes($locale->id)->link_title : '') }}" placeholder="Введите название" required>
                    @error('translations.*.link_title')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                @isset($philosophy)
                    <input type="hidden" name="translations[{{ $locale->id }}][id]" value="{{ $philosophy->getTranslatedAttributes($locale->id)->id }}" />
                @endisset
            </div>
        @endforeach
    </div>

    <div class="mt-3">
        <label class="form-label" for="image-upload"> {{ __('Загрузите или перетащите сюда свои изображения') }} (*) </label>
        <input type="file" id="image-preview" name="icon[]" multiple class="form-control" value="{{ old('icon') ?? (isset($philosophy) ? $philosophy->icon : '') }}"/>
        @error('icon')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mt-3">
        <label class="form-label" for="link"> {{ __('Добавить ссылку') }} (*) </label>
        <input type="text" id="link" name="link" class="form-control" value="{{ old('link') ?? (isset($philosophy) ? $philosophy->link : '') }}" required/>
        @error('link')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    @isset($philosophy)
        <div class="mt-3 mb-3">
            @php
                $icons = explode(',', $philosophy->icon)
            @endphp
            @foreach($icons as $icon)
            <img src="{{ asset(philosophy_file_path() . $icon) }}" alt="">
            @endforeach
        </div>
    @endisset

</div>

<div class="d-flex justify-content-between mt-3">
    <button type="submit" class="btn btn-primary me-2"> @if(isset($philosophy)) {{ __('Сохранить') }} @else {{ __('Добавить') }} @endif </button>
</div>

