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
          <label class="form-label">{{ __('Title') }}(*)</label>
          <input type="text" name="translations[{{ $locale->id }}][title]" class="form-control @error('translations.*.title') is-invalid @enderror" @isset($page) value="{{ $page->getTranslatedAttributes($locale->id)->title }}" @endisset placeholder="Enter title">
          @error('translations.*.title')
          <span class="invalid-feedback" role="alert">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">{{ __('Content') }}</label>
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
    <label for="image" class="form-label">{{ __('Images') }}</label>
    <input type="file" name="image" multiple class="form-control" @isset($page) {{ $page->image }} @endisset>
  </div>

  <div class="mt-3 mb-3">
    <label for="exampleFormControlSelect1" class="form-label">{{ __('Status') }}(*)</label>
    <select class="form-select" id="exampleFormControlSelect1" required name="status">
      <option value="">{{ __('Select') }} status</option>
      <option value="1" @isset($page) {{ $page->status == 1 ? "selected" : '' }} @endisset>{{ __('Active') }}</option>
      <option value="2" @isset($page) {{ $page->status == 2 ? "selected" : '' }} @endisset>{{ __('Inactive') }}</option>
    </select>
  </div>

  <div class="d-flex justify-content-between">
    <button type="submit" class="btn btn-primary me-2">
      @isset($page) {{ __('Save') }} @else {{ __('Create') }} @endisset
    </button>
  </div>

  @push('plugin-scripts')
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
  @endpush

  @push('custom-scripts')
    <script src="{{ asset('assets/js/tinymce.js') }}"></script>
  @endpush
