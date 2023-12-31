@extends('layout.master2')

@section('content')
    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="card">
                    <div class="row">

                        <div class="col-md-12 ps-md-0">
                            <div class="auth-form-wrapper px-4 py-5">
                                <a href="#" class="noble-ui-logo d-block mb-2">Alpaca<span>Admin</span></a>
                                <h5 class="text-muted fw-normal mb-4">{{ __('Добро пожаловать! Войдите в свой аккаунт.') }}</h5>
                                <form method="POST" action="{{ route('login') }}" class="forms-sample">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="userEmail" class="form-label">{{ __('Электронная почта') }}</label>
                                        <input name="email" id="userEmail" type="email" placeholder="Введите электронная почта" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="userPassword" class="form-label">{{ __('Пароль') }}</label>
                                        <input name="password" id="userPassword" type="password" placeholder="Введите пароль" class="form-control @error('password') is-invalid @enderror"  required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
{{--                                    <div class="form-check mb-3">--}}
{{--                                        <input class="form-check-input" type="checkbox" name="remember" id="authCheck" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                                        <label class="form-check-label" for="authCheck">--}}
{{--                                            {{ __('Запомнить меня') }}--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
                                    <div>
                                        <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0">{{ __('Авторизоваться') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
