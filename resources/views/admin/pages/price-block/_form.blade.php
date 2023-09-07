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
                    <input type="text" name="translations[{{ $locale->id }}][title]" class="form-control @error('translations.*.title') is-invalid @enderror" value="{{ old('translations.1.title') ?? (isset($price_block) ? $price_block->getTranslatedAttributes($locale->id)->title : '') }}"  placeholder="Введите название">
                    @error('translations.*.title')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Ожидаемые варианты') }}(*)</label>
                    <input type="text" name="translations[{{ $locale->id }}][excepted_options]" class="form-control @error('translations.*.excepted_options') is-invalid @enderror" value="{{ old('translations.1.excepted_options') ?? (isset($price_block) ? $price_block->getTranslatedAttributes($locale->id)->excepted_options : '') }}"  placeholder="Введите название">
                    @error('translations.*.excepted_options')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Игнорируемые варианты') }}</label>
                    <input type="text" name="translations[{{ $locale->id }}][ignored_options]" class="form-control @error('translations.*.ignored_options') is-invalid @enderror" value="{{ old('translations.1.ignored_options') ?? (isset($price_block) ? $price_block->getTranslatedAttributes($locale->id)->ignored_options : '') }}"  placeholder="Введите название">
                    @error('translations.*.ignored_options')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Ценовой период') }}(*)</label>
                        <input type="text" name="translations[{{ $locale->id }}][package_period]" class="form-control @error('translations.*.package_period') is-invalid @enderror" value="{{ old('translations.1.package_period') ?? (isset($price_block) ? $price_block->getTranslatedAttributes($locale->id)->package_period : '') }}"  placeholder="Введите название. Например: месяц ">
                        @error('translations.*.package_period')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Название ссылки') }}(*)</label>
                    <input type="text" name="translations[{{ $locale->id }}][link_title]" class="form-control @error('translations.*.link_title') is-invalid @enderror" value="{{ old('translations.1.link_title') ?? (isset($price_block) ? $price_block->getTranslatedAttributes($locale->id)->link_title : '') }}" placeholder="Введите название" required>
                    @error('translations.*.link_title')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                @isset($id)
                    <input type="hidden" name="page_id" value="{{ $id->id }}" />
                @endisset

                @isset($price_block)
                    <input type="hidden" name="translations[{{ $locale->id }}][id]" value="{{ $price_block->getTranslatedAttributes($locale->id)->id }}" />
                @endisset
            </div>
        @endforeach
    </div>
</div>

<div class="mt-3">
    <label for="price" class="form-label">{{ __('Price') }} ( ₽ *)</label>
    <input type="number" name="price" class="form-control" value="{{old('price') ?? (isset($price_block) ? $price_block->price : '') }}" >
</div>

<div class="mt-3">
    <label for="order_id" class="form-label">{{ __('Порядок номер блока') }}</label>
    <input type="number" name="order_id" class="form-control" value="{{old('order_id') ?? (isset($price_block) ? $price_block->order_id : '') }}" >
</div>

<div class="mt-3">
    <label for="link" class="form-label">{{ __('Ссылка') }} (*)</label>
    <input type="text" name="link" class="form-control" value="{{old('link') ?? (isset($price_block) ? $price_block->link : '') }}" >
</div>

<div class="mt-3 mb-3">
    <label for="icon" class="form-label">{{ __('Изображение') }}</label>
    <input type="file" name="icon" class="form-control" value="{{old('icon') ?? (isset($price_block) ? $price_block->icon : '') }}" >
</div>

@isset($price_block)
<div class="raw">
    <img src="{{ asset(prices_file_path().$price_block->icon) }}" alt="Prices icon">
</div>
@endisset

<div class="d-flex justify-content-between mt-3">
    <button type="submit" class="btn btn-primary me-2"> @if(isset($price_block)) {{ __('Save') }} @else {{ __('Add') }} @endif </button>
</div>
