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
                    <input type="text" name="translations[{{ $locale->id }}][full_name]" class="form-control @error('translations.*.full_name') is-invalid @enderror" value="{{ old('translations.1.full_name') ?? (isset($comment) ? $comment->getTranslatedAttributes($locale->id)->full_name : '') }}" placeholder="Введите полное имя">
                    @error('translations.*.full_name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Текст') }}</label>
                    <textarea class="form-control @error('translations.*.text') is-invalid @enderror" name="translations[{{ $locale->id }}][text]" rows="4"> {{ old('translations.1.text') ?? (isset($comment) ? $comment->getTranslatedAttributes($locale->id)->text : '') }} </textarea>
                    @error('translations.*.text')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Позиция') }}</label>
                    <input type="text" name="translations[{{ $locale->id }}][position]" class="form-control @error('translations.*.position') is-invalid @enderror" value="{{ old('translations.1.position') ?? (isset($comment) ? $comment->getTranslatedAttributes($locale->id)->position : '') }}" placeholder="Введите позицию">
                    @error('translations.*.position')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                @isset($id)
                    <input type="hidden" name="page_id" value="{{ $id->id }}" />
                @endisset

                @isset($comment)
                    <input type="hidden" name="translations[{{ $locale->id }}][id]" value="{{ $comment->getTranslatedAttributes($locale->id)->id }}" />
                @endisset
            </div>
        @endforeach
    </div>
</div>

<div class="mt-3">
    <label for="order_id" class="form-label">{{ __('Порядок номер блока') }}</label>
    <input type="number" name="order_id" class="form-control" value="{{ old('order_id') ?? (isset($comment) ? $comment->order_id : '') }}">
</div>

<div class="mt-3 mb-3">
    <label for="logo" class="form-label">{{ __('Логотип') }}</label>
    <input type="file" name="logo" class="form-control" value="{{ old('logo') ?? (isset($comment) ? $comment->logo : '') }}">
</div>

<div class="mt-3 mb-3">
    <label for="image" class="form-label">{{ __('Изображение') }}</label>
    <input type="file" name="image" class="form-control" value="{{ old('image') ?? (isset($comment) ? $comment->image : '') }}">
</div>

@isset($comment)
<div class="raw">
    <img src="{{ asset(comment_file_path().$comment->logo) }}" alt="Comment logo">

    <img src="{{ asset(comment_file_path().$comment->image) }}" alt="Comment image">
</div>
@endisset

<div class="d-flex justify-content-between mt-3">
    <button type="submit" class="btn btn-primary me-2"> @if(isset($comment)) {{ __('Сохранить') }} @else {{ __('Добавить') }} @endif </button>
</div>
