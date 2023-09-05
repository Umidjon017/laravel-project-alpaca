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
          <input type="text" name="translations[{{ $locale->id }}][title]" class="form-control @error('translations.*.title') is-invalid @enderror" @isset($page) value="{{ $page->getTranslatedAttributes($locale->id)->title }}" @endisset placeholder="Введите название">
          @error('translations.*.title')
          <span class="invalid-feedback" role="alert">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">{{ __('Контент') }}</label>
          <textarea class="form-control ckeditor" name="translations[{{ $locale->id }}][content]" rows="10">@isset($page) {{ $page->getTranslatedAttributes($locale->id)->content }} @endisset</textarea>
        </div>
        @isset($page)
        <input type="hidden"  name="translations[{{ $locale->id }}][id]" value="{{ $page->getTranslatedAttributes($locale->id)->id }}">
        @endisset
      </div>
      @endforeach
    </div>
</div>

<div class="mt-3">
    <label for="image" class="form-label">{{ __('Изображений') }}</label>
    <input type="file" name="image" multiple class="form-control" @isset($page) {{ $page->image }} @endisset>
</div>

<div class="mt-3">
    <label class="form-label">{{ __('Мета заголовок') }}</label>
    <input type="text" name="meta_title" class="form-control" @isset($page) value="{{ $page->meta_title }}" @endisset placeholder="Введите Мета-заголовок">
</div>

<div class="mt-3">
    <label class="form-label">{{ __('Мета описание') }}</label>
    <input type="text" name="meta_description" class="form-control" @isset($page) value="{{ $page->meta_description }}" @endisset placeholder="Введите Мета-описание">
</div>

<div class="mt-3">
    <label class="form-label">{{ __('Мета ключевые слова') }}</label>
    <input type="text" name="meta_keywords" class="form-control" @isset($page) value="{{ $page->meta_keywords }}" @endisset placeholder="Введите Мета-ключевые слова">
</div>

<div class="d-flex justify-content-between">
    <button type="submit" class="btn btn-primary me-2 mt-3">
      @isset($page) {{ __('Сохранить') }} @else {{ __('Создавать') }} @endisset
    </button>
</div>
