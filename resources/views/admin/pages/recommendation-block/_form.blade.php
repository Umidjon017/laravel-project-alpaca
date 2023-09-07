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
                    <input type="text" name="translations[{{ $locale->id }}][title]" class="form-control @error('translations.*.title') is-invalid @enderror" value="{{ old('translations.1.title') ?? (isset($recommendation_block) ? $recommendation_block->getTranslatedAttributes($locale->id)->title : '') }}" placeholder="Введите название">
                    @error('translations.*.title')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Описание') }}</label>
                    <textarea class="form-control @error('translations.1.description') is-invalid @enderror" name="translations[{{ $locale->id }}][description]" rows="4"> {{ old('translations.1.description') ?? (isset($recommendation_block) ? $recommendation_block->getTranslatedAttributes($locale->id)->description : '') }} </textarea>
                    @error('translations.*.description')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Название ссылки') }}(*)</label>
                    <input type="text" name="translations[{{ $locale->id }}][link_title]" class="form-control @error('translations.*.link_title') is-invalid @enderror" value="{{ old('translations.1.link_title') ?? (isset($recommendation_block) ? $recommendation_block->getTranslatedAttributes($locale->id)->link_title : '') }}" placeholder="Введите название">
                    @error('translations.*.link_title')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                @isset($id)
                    <input type="hidden" name="page_id" value="{{ $id->id }}" />
                @endisset

                @isset($recommendation_block)
                    <input type="hidden" name="translations[{{ $locale->id }}][id]" value="{{ $recommendation_block->getTranslatedAttributes($locale->id)->id }}" />
                @endisset
            </div>
        @endforeach
    </div>
</div>

<div class="mt-3">
    <label for="link" class="form-label">{{ __('Ссылка') }}</label>
    <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('translations.1.description') ?? (isset($recommendation_block) ? $recommendation_block->link : '') }}">
    @error('link')
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="mt-3 mb-3">
    <label for="image" class="form-label">{{ __('Изображение') }}</label>
    <input type="file" name="image" class="form-control @error('link') is-invalid @enderror" value="{{ old('translations.1.description') ?? (isset($recommendation_block) ? $recommendation_block->image : '') }}">
</div>

@isset($recommendation_block)
<div class="raw">
    <img src="{{ asset(recommendations_admin_file_path().$recommendation_block->image) }}" alt="Comment image">
</div>
@endisset

<div class="d-flex justify-content-between mt-3">
    <button type="submit" class="btn btn-primary me-2"> @if(isset($recommendation_block)) {{ __('Save') }} @else {{ __('Add') }} @endif </button>
</div>
