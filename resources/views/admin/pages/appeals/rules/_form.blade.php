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
                    <label class="form-label">{{ __('Для заголовка персональных данных') }}(*)</label>
                    <input type="text" name="translations[{{ $locale->id }}][agreement_personal_data]" class="form-control @error('translations.*.agreement_personal_data') is-invalid @enderror" @isset($rule) value="{{ $rule->getTranslatedAttributes($locale->id)->agreement_personal_data }}" @endisset placeholder="Введите название">
                    @error('translations.*.agreement_personal_data')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Для названия политики персональных данных') }}(*)</label>
                    <input type="text" name="translations[{{ $locale->id }}][agreement_personal_data_policy]" class="form-control @error('translations.*.agreement_personal_data_policy') is-invalid @enderror" @isset($rule) value="{{ $rule->getTranslatedAttributes($locale->id)->agreement_personal_data_policy }}" @endisset placeholder="Введите название">
                    @error('translations.*.agreement_personal_data_policy')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                @isset($id)
                    <input type="hidden" name="page_id" value="{{ $id->id }}" />
                @endisset

                @isset($rule)
                    <input type="hidden" name="translations[{{ $locale->id }}][id]" value="{{ $rule->getTranslatedAttributes($locale->id)->id }}" />
                @endisset
            </div>
        @endforeach
    </div>
</div>

<div class="mt-3">
    <label for="file_personal_data" class="form-label">{{ __('Файл для согласования персональных данных') }}</label>
    <input type="file" name="file_personal_data" class="form-control @error('file_personal_data') is-invalid @enderror" @isset($role) {{ $role->file_personal_data }} @endisset>
    @error('file_personal_data')
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="mt-3">
    <label for="file_personal_policy" class="form-label">{{ __('Файл для согласования политики обработки персональных данных') }}</label>
    <input type="file" name="file_personal_data_policy" class="form-control @error('file_personal_data_policy') is-invalid @enderror" @isset($role) {{ $role->file_personal_data_policy }} @endisset>
    @error('file_personal_data_policy')
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="d-flex justify-content-between mt-3">
    <button type="submit" class="btn btn-primary me-2"> @if(isset($rule)) {{ __('Сохранить') }} @else {{ __('Добавить') }} @endif </button>
</div>

