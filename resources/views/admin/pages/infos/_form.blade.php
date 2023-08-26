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
                    <input type="text" name="translations[{{ $locale->id }}][title]" class="form-control @error('translations.*.title') is-invalid @enderror" @isset($info) value="{{ $info->getTranslatedAttributes($locale->id)->title }}" @endisset placeholder="Enter title">
                    @error('translations.*.title')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Описание') }}</label>
                    <textarea class="form-control" name="translations[{{ $locale->id }}][description]" rows="4"> @isset($info) {{ $info->getTranslatedAttributes($locale->id)->description }} @endisset </textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Контент') }}</label>
                    <textarea class="form-control ckeditor" name="translations[{{ $locale->id }}][body]" rows="10"> @isset($info) {{ $info->getTranslatedAttributes($locale->id)->body }} @endisset </textarea>
                </div>
                @isset($id)
                <input type="hidden" name="page_id" value="{{ $id->id }}" />
                @endisset

                @isset($info)
                    <input type="hidden" name="translations[{{ $locale->id }}][id]" value="{{ $info->getTranslatedAttributes($locale->id)->id }}" />
                @endisset
            </div>
        @endforeach
    </div>
</div>

<div class="mt-3">
    <label for="link" class="form-label">{{ __('Ссылка') }}</label>
    <input type="text" name="link" class="form-control" @isset($info) value="{{ $info->link }}" @endisset>
</div>

<div class="mt-3 mb-3">
    <label for="image" class="form-label">{{ __('Изображение') }}</label>
    <input type="file" name="image" multiple class="form-control" @isset($info) value="{{ $info->image }}" @endisset>
</div>

@isset($info)
    <div class="raw">
        <img src="{{ asset(info_file_path().$info->image) }}" alt="Info image">
    </div>
@endisset

<div class="d-flex justify-content-between mt-3">
    <button type="submit" class="btn btn-primary me-2"> @if(isset($info)) {{ __('Сохранить') }} @else {{ __('Добавить') }} @endif </button>
</div>

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/tinymce.js') }}"></script>
@endpush
