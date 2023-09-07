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
                    <input type="text" name="translations[{{ $locale->id }}][title]" class="form-control @error('translations.*.title') is-invalid @enderror" value="{{ old('translations.1.title') ?? (isset($appeal) ? $appeal->getTranslatedAttributes($locale->id)->title : '') }}" placeholder="Введите название">
                    @error('translations.*.title')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Описание') }}</label>
                    <textarea class="form-control @error('translations.*.description') is-invalid @enderror" name="translations[{{ $locale->id }}][description]" rows="4"> {{ old('translations.1.description') ?? (isset($appeal) ? $appeal->getTranslatedAttributes($locale->id)->description : '') }} </textarea>
                    @error('translations.*.description')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Тема заявления') }}(*)</label>
                    <input type="text" name="translations[{{ $locale->id }}][theme]" class="form-control @error('translations.*.theme') is-invalid @enderror" value="{{ old('translations.1.theme') ?? (isset($appeal) ? $appeal->getTranslatedAttributes($locale->id)->theme : '') }}" placeholder="Введите название">
                    @error('translations.*.theme')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Электронная почта') }}(*)</label>
                    <input type="text" name="translations[{{ $locale->id }}][email]" class="form-control @error('translations.*.email') is-invalid @enderror" value="{{ old('translations.1.email') ?? (isset($appeal) ? $appeal->getTranslatedAttributes($locale->id)->email : '') }}" placeholder="Введите название">
                    @error('translations.*.email')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Имя') }}(*)</label>
                    <input type="text" name="translations[{{ $locale->id }}][name]" class="form-control @error('translations.*.name') is-invalid @enderror" value="{{ old('translations.1.name') ?? (isset($appeal) ? $appeal->getTranslatedAttributes($locale->id)->name : '') }}" placeholder="Введите название">
                    @error('translations.*.name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Комментарий') }}(*)</label>
                    <input type="text" name="translations[{{ $locale->id }}][comment]" class="form-control @error('translations.*.comment') is-invalid @enderror" value="{{ old('translations.1.comment') ?? (isset($appeal) ? $appeal->getTranslatedAttributes($locale->id)->comment : '') }}" placeholder="Введите название">
                    @error('translations.*.comment')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Имя ссылки') }}(*)</label>
                    <input type="text" name="translations[{{ $locale->id }}][link]" class="form-control @error('translations.*.link') is-invalid @enderror" value="{{ old('translations.1.link') ?? (isset($appeal) ? $appeal->getTranslatedAttributes($locale->id)->link : '') }}" placeholder="Введите название">
                    @error('translations.*.link')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                @isset($id)
                    <input type="hidden" name="page_id" value="{{ $id->id }}" />
                @endisset

                @isset($appeal)
                    <input type="hidden" name="translations[{{ $locale->id }}][id]" value="{{ $appeal->getTranslatedAttributes($locale->id)->id }}" />
                @endisset
            </div>
        @endforeach
    </div>
</div>

<div class="mt-3">
    <label for="order_id" class="form-label">{{ __('Порядок номер блока') }}</label>
    <input type="number" name="order_id" class="form-control  @error('order_id') is-invalid @enderror" value="{{ old('translations.1.order_id') ?? (isset($appeal) ? $appeal->order_id : '') }}">
    @error('order_id')
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="d-flex justify-content-between mt-3">
    <button type="submit" class="btn btn-primary me-2"> @if(isset($appeal)) {{ __('Сохранить') }} @else {{ __('Добавить') }} @endif </button>
</div>

