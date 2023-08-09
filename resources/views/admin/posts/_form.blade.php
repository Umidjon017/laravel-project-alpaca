@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

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
        <label class="form-label">Заголовок</label>
        <input type="text" name="translations[{{ $locale->id }}][title]" class="form-control @error('translations.*') is-invalid @enderror  " @isset($post) value="{{ $post->getTranslatedAttributes($locale->id)->title }}" @endisset placeholder="Введите заголовок...">
        @error('translations.*.title')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Описание</label>
        <input type="text" name="translations[{{ $locale->id }}][description]" class="form-control" @isset($post) value="{{ $post->getTranslatedAttributes($locale->id)->description }}" @endisset placeholder="Введите описание...">
      </div>
      <div class="mb-3">
        <label class="form-label">Контент</label>
        <textarea class="form-control ckeditor" name="translations[{{ $locale->id }}][body]" rows="10">@isset($post) {{ $post->getTranslatedAttributes($locale->id)->body }} @endisset</textarea>
      </div>
      @isset($post)
      <input type="hidden"  name="translations[{{ $locale->id }}][id]" value="{{ $post->getTranslatedAttributes($locale->id)->id }}">
      @endisset
    </div>
    @endforeach
  </div>
</div>

<hr>

<div class="mb-3">
    <label class="form-label">Проекты(*)</label>
    <select class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%" name="project_id[]">
        <option value="">Выберите проект</option>
        @foreach ($projects as $project)
        <option value="{{ $project->id }}" 
          @isset($post) 
          @foreach ($post->projects as $p)
            @if($p->id==$project->id) selected @endif
          @endforeach
          @endisset
          > 
          {{ $project->getTranslatedAttributes(session('locale_id'))->name }} 
        </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
  <label for="image" class="form-label">Фото</label>
  <input type="file" name="image" id="image" class="form-control" value="{{ $post->image ?? '' }}">
</div>

<div class="d-flex justify-content-between">
  <button type="submit" class="btn btn-primary me-2">
    @isset($post) Обновить @else Сохранить @endisset
  </button>
</div>


@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script src="{{ asset('assets/js/tinymce.js') }}"></script>
@endpush
