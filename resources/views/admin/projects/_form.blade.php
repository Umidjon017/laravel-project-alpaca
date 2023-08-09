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
        <label class="form-label">Название(*)</label>
        <input type="text" name="translations[{{ $locale->id }}][name]" class="form-control @error('translations.*.name') is-invalid @enderror  " @isset($project) value="{{ $project->getTranslatedAttributes($locale->id)->name }}" @endisset placeholder="Введите заголовок...">
        @error('translations.*.name')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Буклет</label>
        <input type="file" name="translations[{{ $locale->id }}][booklet]" class="form-control @error('translations.*.booklet') is-invalid @enderror" @isset($project) value="{{ $project->getTranslatedAttributes($locale->id)->booklet }} @endisset">
      </div>
      <div class="mb-3">
        <label class="form-label">Контент</label>
        <textarea class="form-control ckeditor" name="translations[{{ $locale->id }}][body]" rows="10">@isset($project) {{ $project->getTranslatedAttributes($locale->id)->body }} @endisset</textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Адрес</label>
        <input type="text" name="translations[{{ $locale->id }}][addres]" class="form-control @error('translations.*.addres') is-invalid @enderror  " @isset($project) value="{{ $project->getTranslatedAttributes($locale->id)->addres }}" @endisset placeholder="Введите адрес...">
        @error('translations.*.addres')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Двор</label>
        <input type="text" name="translations[{{ $locale->id }}][yard_text]" class="form-control @error('translations.*.yard_text') is-invalid @enderror  " @isset($project) value="{{ $project->getTranslatedAttributes($locale->id)->yard_text }}" @endisset placeholder="Введите текст...">
        @error('translations.*.yard_text')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Холлы</label>
        <input type="text" name="translations[{{ $locale->id }}][hall_text]" class="form-control @error('translations.*.hall_text') is-invalid @enderror  " @isset($project) value="{{ $project->getTranslatedAttributes($locale->id)->hall_text }}" @endisset placeholder="Введите текст...">
        @error('translations.*.hall_text')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-3">
          <label class="form-label">Term</label>
          <textarea class="form-control ckeditor" name="translations[{{ $locale->id }}][term]" rows="10">@isset($project) {{ $project->getTranslatedAttributes($locale->id)->term }} @endisset</textarea>
      </div>
      @isset($project)
      <input type="hidden"  name="translations[{{ $locale->id }}][id]" value="{{ $project->getTranslatedAttributes($locale->id)->id }}">
      @endisset
    </div>
    @endforeach
  </div>
</div>
<hr>

<div class="mb-3">
    <label class="form-label">Bitrix ID</label>
    <input type="number" name="bitrix_id" class="form-control" value="{{ $project->bitrix_id ?? '' }}" required>
</div>

<div class="mb-3">
  <label for="image" class="form-label">Фото(Двор)</label>
  <input type="file" name="yard_image" class="form-control" @isset($project) {{ $project->yard_image }} @endisset>
</div>

<div class="mb-3">
  <label for="image" class="form-label">Фото(Холл)</label>
  <input type="file" name="hall_image" class="form-control" @isset($project) {{ $project->hall_image }} @endisset>
</div>

<div class="mb-3">
  <label for="exampleFormControlSelect1" class="form-label">Регион(*)</label>
  <select class="form-select" id="exampleFormControlSelect1" name="region_id" required>
    <option value="">Выберите регион</option>
    @foreach ($regions as $region)
    <option value="{{ $region->id }}" @isset($project) @if($region->id === $project->region_id) selected @endif @endisset>
        {{ $region->getTranslatedAttributes(session('locale_id'))->name }}
    </option>
    @endforeach
  </select>
</div>

<div class="mb-3">
  <label class="form-label">Этажей(*)</label>
  <input type="number" name="floors" class="form-control" value="{{ $project->floors ?? '' }}" required>
</div>

<div class="mb-3">
  <label class="form-label">Квартир(*)</label>
  <input type="number" name="apartments" class="form-control" value="{{ $project->apartments ?? '' }}" required>
</div>

<div class="mb-3">
  <label for="image" class="form-label">Фото(Карточка)(*)</label>
  <input type="file" name="card_image" class="form-control" @isset($project) {{ $project->card_image }} @endisset>
</div>

<div class="mb-3">
  <label for="image" class="form-label">Фото(Background)</label>
  <input type="file" name="background_image" class="form-control" @isset($project) {{ $project->background_image }} @endisset >
</div>

<div class="mb-3">
  <label for="image" class="form-label">Логотип</label>
  <input type="file" name="logo" class="form-control" @isset($project) {{ $project->logo }} @endisset >
</div>

<div class="mb-3">
  <label class="form-label">3D Тур 1</label>
  <input type="text" name="3d_tour_one" class="form-control" value="{{ $project->{'3d_tour_one'} ?? '' }}">
</div>


<div class="mb-3">
  <label class="form-label">3D Тур 2</label>
  <input type="text" name="3d_tour_two" class="form-control" value="{{ $project->{'3d_tour_two'} ?? '' }}">
</div>

<div class="mb-3">
  <label class="form-label">Локация</label>
  <input type="text" name="location" class="form-control" value="{{ $project->location ?? '' }}">
</div>

<div class="mb-3">
  <label class="form-label">Широта</label>
  <input type="text" name="latitude" class="form-control" value="{{ $project->latitude ?? '' }}">
</div>

<div class="mb-3">
  <label class="form-label">Долгота</label>
  <input type="text" name="longitude" class="form-control" value="{{ $project->longitude ?? '' }}">
</div>

<div class="mb-3">
  <label class="form-label">Order</label>
  <input type="text" name="order" class="form-control" value="{{ $project->order ?? '' }}">
</div>

<div class="mb-3">
  <label class="form-label">Logo Map</label>
  <input type="text" name="logo_map" class="form-control" value="{{ $project->logo_map ?? '' }}">
</div>

<div class="mb-3">
  <label for="image" class="form-label">Фотографии(для галарея)</label>
  <input type="file" name="image[]" multiple class="form-control" @isset($project) {{ $project->image }} @endisset>
</div>

<div class="mb-3">
  <label class="form-label">Ссылка на видео проекта</label>
  <input type="text" name="link" class="form-control" @isset($project) @foreach($project->videos as $video) value="{{ $video->link ?? '' }}" @endforeach @endisset>
</div>

<div class="mb-3">
  <label for="exampleFormControlSelect1" class="form-label">Статус(*)</label>
  <select class="form-select" id="exampleFormControlSelect1" required name="status">
    <option value="">Выберите статус</option>
    <option value="1" @isset($project) {{ $project->status == 1 ? "selected" : '' }} @endisset>Текущий</option>
    <option value="2" @isset($project) {{ $project->status == 2 ? "selected" : '' }} @endisset>Завершенный</option>
  </select>
</div>

<div class="d-flex justify-content-between">
  <button type="submit" class="btn btn-primary me-2">
    @isset($project) Обновить @else Сохранить @endisset
  </button>
</div>


@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/tinymce.js') }}"></script>
@endpush
