<div class="example">
    <div class="mb-3">
        <label class="form-label">{{ __('Электронная почта') }}(*)</label>
        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? (isset($user) ? $user->email : '') }}" placeholder="Введите Электронная почта">
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">{{ __('Имя') }}(*)</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? (isset($user) ? $user->name : '') }}" placeholder="Введите Имя">
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">{{ __('Пароль') }}(*)</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Введите пароль">
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">{{ __('Повторите Пароль') }}(*)</label>
        <input type="password" name="retype_password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Повторите пароль">
        @error('retype_password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="d-flex justify-content-between mt-3">
    <button type="submit" class="btn btn-primary me-2"> @if(isset($user)) {{ __('Сохранить') }} @else {{ __('Добавить') }} @endif </button>
</div>

