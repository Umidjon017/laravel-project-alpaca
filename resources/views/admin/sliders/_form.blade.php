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
    @foreach($localizations as $locale)
    <div class="tab-pane fade @if($loop->first) show active @endif" id="{{ $locale->name }}" role="tabpanel" aria-labelledby="{{$locale->name}}-tab">
        <div class="mb-3">
          <label class="form-label">Фото</label>
          <input type="file" name="translations[{{ $locale->id }}][image]" class="form-control @error('translations.*.image') is-invalid @enderror" @isset($slider) value="{{ $slider->getTranslatedAttributes($locale->id)->image }} @endisset">
          @error('translations.*.image')
          <span class="invalid-feedback" role="alert">{{ $message }}</span>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Ссылка</label>
          <input type="text" name="translations[{{ $locale->id }}][url]" class="form-control @error('translations.*.url') is-invalid @enderror" @isset($slider) value="{{ $slider->getTranslatedAttributes($locale->id)->url }} @endisset" placeholder="https://via.placeholder.com/600/92c952">
          @error('translations.*.url')
          <span class="invalid-feedback" role="alert">{{ $message }}</span>
          @enderror
        </div>
        @isset($slider)
            <input type="hidden"  name="translations[{{ $locale->id }}][id]" value="{{ $slider->getTranslatedAttributes($locale->id)->id }}">
        @endisset
    </div>
    @endforeach
</div>
</div>
<div class="d-flex justify-content-between">
  <button type="submit" class="btn btn-primary me-2">
    @isset($slider) Обновить @else Сохранить @endisset
  </button>
</div>
