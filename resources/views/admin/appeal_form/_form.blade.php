<div class="example">
    <div class="mb-3">
        <label class="form-label">{{ __('Электронная почта') }}(*)</label>
        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? (isset($appeal_form) ? $appeal_form->email : '') }}" placeholder="Введите Электронная почта">
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">{{ __('Имя') }}(*)</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? (isset($appeal_form) ? $appeal_form->name : '') }}" placeholder="Введите Имя">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">{{ __('Текст') }}</label>
        <textarea class="form-control" name="text" rows="4" value="{{ old('text') }}"> @isset($appeal_form) {{ $appeal_form->text }} @endisset </textarea>
        @error('text')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-3 mb-3">
        <label for="exampleFormControlSelect1" class="form-label">{{ __('Status') }}(*)</label>
        <select class="form-select" id="exampleFormControlSelect1" required name="status">
            <option value="">{{ __('Выберите статус') }}</option>
            <option value="1" selected @isset($appeal_form) {{ $appeal_form->status == 1 ? "selected" : '' }} @endisset>{{ __('Активный') }}</option>
            <option value="2" @isset($appeal_form) {{ $appeal_form->status == 2 ? "selected" : '' }} @endisset>{{ __('Неактивный') }}</option>
        </select>
    </div>
</div>

<div class="d-flex justify-content-between mt-3">
    <button type="submit" class="btn btn-primary me-2"> @if(isset($appeal_form)) {{ __('Сохранить') }} @else {{ __('Добавить') }} @endif </button>
</div>

