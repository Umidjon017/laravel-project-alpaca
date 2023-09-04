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
                    <input type="text" name="translations[{{ $locale->id }}][title]" class="form-control @error('translations.*.title') is-invalid @enderror" value="{{ old('translations.1.title') ?? (isset($banner) ? $banner->getTranslatedAttributes($locale->id)->title : '') }}" placeholder="Введите название" required>
                    @error('translations.*.title')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Описание') }}(*)</label>
                    <textarea class="form-control @error('translations.*.description') is-invalid @enderror" name="translations[{{ $locale->id }}][description]" rows="4"> {{ old('translations.1.description') ?? (isset($banner) ? $banner->getTranslatedAttributes($locale->id)->description : '') }} </textarea>
                    @error('translations.*.description')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Заголовок ссылки для кнопки «Попробовать»') }}(*)</label>
                    <input type="text" name="translations[{{ $locale->id }}][try_link_title]" class="form-control @error('translations.*.try_link_title') is-invalid @enderror" value="{{ old('translations.1.try_link_title') ?? (isset($banner) ? $banner->getTranslatedAttributes($locale->id)->try_link_title : '') }}" placeholder="Введите название" required>
                    @error('translations.*.try_link_title')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Заголовок ссылки для кнопки «Подробнее»') }}(*)</label>
                    <input type="text" name="translations[{{ $locale->id }}][more_link_title]" class="form-control @error('translations.*.more_link_title') is-invalid @enderror" value="{{ old('translations.1.more_link_title') ?? (isset($banner) ? $banner->getTranslatedAttributes($locale->id)->more_link_title : '') }}" placeholder="Введите название" required>
                    @error('translations.*.more_link_title')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                @isset($banner)
                    <input type="hidden" name="translations[{{ $locale->id }}][id]" value="{{ $banner->getTranslatedAttributes($locale->id)->id }}" />
                @endisset
            </div>
        @endforeach
    </div>

    <div class="mt-3">
        <label class="form-label" for="image-upload"> {{ __('Загрузите или перетащите сюда свои логотипы') }} (*) </label>
        <input type="file" id="image-preview" name="image" class="form-control" value="{{ old('image') ?? (isset($banner) ? $banner->image : '') }}"/>
        @error('image')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mt-3">
        <label class="form-label" for="try_link"> {{ __('Добавьте ссылку на кнопку «Попробовать»') }} (*) </label>
        <input type="text" id="try_link" name="try_link" class="form-control" value="{{ old('try_link') ?? (isset($banner) ? $banner->try_link : '') }}" required/>
        @error('try_link')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mt-3">
        <label class="form-label" for="more_link"> {{ __('Добавьте ссылку на кнопку «Подробнее»') }} (*) </label>
        <input type="text" id="more_link" name="more_link" class="form-control" value="{{ old('more_link') ?? (isset($banner) ? $banner->more_link : '') }}" required/>
        @error('more_link')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    @isset($banner)
    <div class="mt-3 mb-3">
        <img src="{{ asset(banner_file_path() . $banner->image) }}" alt="Banner Image" width="200">
    </div>
    @endisset

</div>

<div class="d-flex justify-content-between mt-3">
    <button type="submit" class="btn btn-primary me-2"> @if(isset($banner)) {{ __('Сохранить') }} @else {{ __('Добавить') }} @endif </button>
</div>

