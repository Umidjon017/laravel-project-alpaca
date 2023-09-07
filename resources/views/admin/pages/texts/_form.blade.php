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
                    <input type="text" name="translations[{{ $locale->id }}][title]" class="form-control @error('translations.*.title') is-invalid @enderror" value="{{ old('translations.1.title') ?? (isset($text) ? $text->getTranslatedAttributes($locale->id)->title : '') }}" placeholder="Enter title">
                    @error('translations.*.title')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Текст (*)') }}</label>
                    <textarea class="form-control ckeditor @error('translations.1.text') is-invalid @enderror" name="translations[{{ $locale->id }}][text]" rows="10">{{ old('translations.1.text') ?? (isset($text) ? $text->getTranslatedAttributes($locale->id)->text : '') }}</textarea>
                    @error('translations.*.text')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                @isset($id)
                    <input type="hidden" name="page_id" value="{{ $id->id }}" />
                @endisset

                @isset($text)
                    <input type="hidden" name="translations[{{ $locale->id }}][id]" value="{{ $text->getTranslatedAttributes($locale->id)->id }}" />
                @endisset
            </div>
        @endforeach
    </div>
</div>

<div class="mt-3">
    <label for="order_id" class="form-label">{{ __('Порядок номер блока') }}</label>
    <input type="number" name="order_id" class="form-control @error('order_id') is-invalid @enderror" @isset($text) value="{{ $text->order_id }}" @endisset>
    @error('order_id')
    <div class="alert alert-danger"> {{ $message }} </div>
    @enderror
</div>

<div class="d-flex justify-content-between mt-3">
    <button type="submit" class="btn btn-primary me-2"> @if(isset($text)) {{ __('Сохранить') }} @else {{ __('Добавить') }} @endif </button>
</div>

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/tinymce.js') }}"></script>
@endpush
