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
                    <label class="form-label">{{ __('Полное имя') }}(*)</label>
                    <input type="text" name="translations[{{ $locale->id }}][full_name]" class="form-control @error('translations.*.full_name') is-invalid @enderror" @isset($comment) value="{{ $comment->getTranslatedAttributes($locale->id)->full_name }}" @endisset placeholder="Enter full_name">
                    @error('translations.*.full_name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Текст') }}</label>
                    <textarea class="form-control ckeditor" name="translations[{{ $locale->id }}][text]" rows="10"> @isset($comment) {{ $comment->getTranslatedAttributes($locale->id)->text }} @endisset </textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Позиция') }}</label>
                    <input type="text" name="translations[{{ $locale->id }}][position]" class="form-control @error('translations.*.position') is-invalid @enderror" @isset($comment) value="{{ $comment->getTranslatedAttributes($locale->id)->position }}" @endisset placeholder="Enter position">
                    @error('translations.*.position')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                @isset($page) @foreach($page->get() as $p)
                    <input type="hidden" name="page_id" value="{{ $p->id }}" />
                @endforeach @endisset

                @isset($comment)
                    <input type="hidden" name="translations[{{ $locale->id }}][id]" value="{{ $comment->getTranslatedAttributes($locale->id)->id }}" />
                @endisset
            </div>
        @endforeach
    </div>
</div>

<div class="mt-3 mb-3">
    <label for="logo" class="form-label">{{ __('Логотип') }}</label>
    <input type="file" name="logo" class="form-control" @isset($comment) value="{{ $comment->logo }}" @endisset>
</div>

<div class="mt-3 mb-3">
    <label for="image" class="form-label">{{ __('Изображение') }}</label>
    <input type="file" name="image" class="form-control" @isset($comment) value="{{ $comment->image }}" @endisset>
</div>

@isset($comment)
<div class="raw">
    <img src="{{ asset(comment_file_path().$comment->logo) }}" alt="Comment logo">

    <img src="{{ asset(comment_file_path().$comment->image) }}" alt="Comment image">
</div>
@endisset

<div class="d-flex justify-content-between mt-3">
    <button type="submit" class="btn btn-primary me-2"> @if(isset($comment)) {{ __('Save') }} @else {{ __('Add') }} @endif </button>
</div>

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/tinymce.js') }}"></script>
@endpush
