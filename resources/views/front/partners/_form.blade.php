<div class="example">
    <div class="mt-3">
        <label class="form-label" for="image-upload"> {{ __('Загрузите или перетащите сюда свои файл') }} (*) </label>
        <input type="file" id="image-preview" name="logo" class="form-control" @isset($partner) value="{{$partner->logo}}" @endisset/>
        @error('logo')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mt-3">
        <label class="form-label" for="link"> {{ __('Добавить ссылку') }} (*) </label>
        <input type="text" id="link" name="link" class="form-control" @isset($partner) value="{{$partner->link}}" @endisset required/>
        @error('link')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    @isset($partner)
    <div class="mt-3 mb-3">
        <img src="{{ asset(partners_file_path() . $partner->logo) }}" alt="For Marketology Image" width="200">
    </div>
    @endisset

</div>

<div class="d-flex justify-content-between mt-3">
    <button type="submit" class="btn btn-primary me-2"> @if(isset($partner)) {{ __('Сохранить') }} @else {{ __('Добавить') }} @endif </button>
</div>

