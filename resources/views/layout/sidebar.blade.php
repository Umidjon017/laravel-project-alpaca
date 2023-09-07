<nav class="sidebar">
  <div class="sidebar-header">
    <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
      {{ __('Alpaca') }}<span>{{ __('Admin') }}</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
        {{-- Glabniy --}}
        <li class="nav-item nav-category">{{ __('Главная') }}</li>
        <li class="nav-item {{ active_class(['admin/dashboard*']) }}">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i data-feather="monitor"></i>
            <span class="link-title">{{ __('Главная') }}</span>
          </a>
        </li>
        <li class="nav-item {{ active_class(['admin/pages*']) }}">
            <a href="{{ route('admin.pages.index') }}" class="nav-link">
              <i data-feather="loader"></i>
              <span class="link-title">{{ __('Страницы') }}</span>
            </a>
        </li>
        <li class="nav-item {{ active_class(['admin/appeal-form*']) }}">
            <a href="{{ route('admin.appeal-form.index') }}" class="nav-link">
              <i data-feather="loader"></i>
              <span class="link-title">{{ __('Заявки') }}</span>
            </a>
        </li>

        {{-- Main Page --}}
        <li class="nav-item nav-category">{{ __('Главная страница') }}</li>
        <li class="nav-item {{ active_class(['admin/main-page/*']) }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#admin" role="button" aria-expanded="{{ is_active_route(['admin/main-page/*']) }}" aria-controls="admin">
                <i class="link-icon" data-feather="layout"></i>
                <span class="link-title">{{ __('Главная страница') }}</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse {{ show_class(['admin/main-page/*']) }}" id="admin">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{ url('/admin/main-page/banners') }}" class="nav-link {{ active_class(['admin/main-page/banners']) }}">{{ __('Баннеры') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/main-page/philosophy') }}" class="nav-link {{ active_class(['admin/main-page/philosophy']) }}">{{ __('Наша философия') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/main-page/doctors') }}" class="nav-link {{ active_class(['admin/main-page/doctors']) }}">{{ __('Для врача') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/main-page/leaders') }}" class="nav-link {{ active_class(['admin/main-page/leaders']) }}">{{ __('Для руководителя') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/main-page/it') }}" class="nav-link {{ active_class(['admin/main-page/it']) }}">{{ __('Для IT') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/main-page/marketology') }}" class="nav-link {{ active_class(['admin/main-page/marketology']) }}">{{ __('Для маркетолога') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/main-page/feedback') }}" class="nav-link {{ active_class(['admin/main-page/feedback']) }}">{{ __('Отзывы клиентов') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/main-page/partners') }}" class="nav-link {{ active_class(['admin/main-page/partners']) }}">{{ __('Наши клиенты') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/main-page/recommendations') }}" class="nav-link {{ active_class(['admin/main-page/recommendations']) }}">{{ __('Рекомендации') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/main-page/menus') }}" class="nav-link {{ active_class(['admin/main-page/menus']) }}">{{ __('Меню') }}</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- Languages --}}
        <li class="nav-item nav-category">{{ __('Языки') }}</li>
        <li class="nav-item {{ active_class(['admin/localizations*']) }}">
            <a href="{{ route('admin.localizations.index') }}" class="nav-link">
                <i data-feather="slack"></i>
                <span class="link-title">{{ __('Языки') }}</span>
            </a>
        </li>

        {{-- Profile --}}
        <li class="nav-item nav-category">{{ __('Профиль') }}</li>
        <li class="nav-item {{ active_class(['admin/users*']) }}">
            <a href="{{ route('admin.users.index') }}" class="nav-link">
                <i data-feather="loader"></i>
                <span class="link-title">{{ __('Профиль') }}</span>
            </a>
        </li>

    </ul>
  </div>
</nav>
{{--<nav class="settings-sidebar">--}}
{{--  <div class="sidebar-body">--}}
{{--    <a href="#" class="settings-sidebar-toggler">--}}
{{--      <i data-feather="settings"></i>--}}
{{--    </a>--}}
{{--    <h6 class="text-muted mb-2">Sidebar:</h6>--}}
{{--    <div class="mb-3 pb-3 border-bottom">--}}
{{--      <div class="form-check form-check-inline">--}}
{{--        <label class="form-check-label">--}}
{{--          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>--}}
{{--          Light--}}
{{--        </label>--}}
{{--      </div>--}}
{{--      <div class="form-check form-check-inline">--}}
{{--        <label class="form-check-label">--}}
{{--          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">--}}
{{--          Dark--}}
{{--        </label>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--    <div class="theme-wrapper">--}}
{{--      <h6 class="text-muted mb-2">Light Version:</h6>--}}
{{--      <a class="theme-item active" href="https://www.nobleui.com/laravel/template/demo1/">--}}
{{--        <img src="{{ url('assets/images/screenshots/light.jpg') }}" alt="light version">--}}
{{--      </a>--}}
{{--      <h6 class="text-muted mb-2">Dark Version:</h6>--}}
{{--      <a class="theme-item" href="https://www.nobleui.com/laravel/template/demo2/">--}}
{{--        <img src="{{ url('assets/images/screenshots/dark.jpg') }}" alt="light version">--}}
{{--      </a>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--</nav>--}}
