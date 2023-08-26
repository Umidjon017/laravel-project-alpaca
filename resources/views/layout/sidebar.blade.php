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
        <li class="nav-item nav-category">{{ __('Главная') }}</li>
        <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i data-feather="monitor"></i>
            <span class="link-title">{{ __('Главная') }}</span>
          </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
            <a href="{{ route('admin.pages.index') }}" class="nav-link">
              <i data-feather="loader"></i>
              <span class="link-title">{{ __('Страницы') }}</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.appeal_form.*') ? 'active' : '' }}">
            <a href="{{ route('admin.appeal_form.index') }}" class="nav-link">
              <i data-feather="loader"></i>
              <span class="link-title">{{ __('Заявки') }}</span>
            </a>
        </li>
        <li class="nav-item nav-category">{{ __('Для фронта') }}</li>
        <li class="nav-item {{ request()->routeIs('admin.banners.*') ? 'active' : '' }}">
            <a href="{{ route('admin.banners.index') }}" class="nav-link">
                <i data-feather="loader"></i>
                <span class="link-title">{{ __('Баннеры') }}</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.philosophy.*') ? 'active' : '' }}">
            <a href="{{ route('admin.philosophy.index') }}" class="nav-link">
                <i data-feather="loader"></i>
                <span class="link-title">{{ __('Наша философия') }}</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.doctors.*') ? 'active' : '' }}">
            <a href="{{ route('admin.doctors.index') }}" class="nav-link">
                <i data-feather="loader"></i>
                <span class="link-title">{{ __('Для врача') }}</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.leaders.*') ? 'active' : '' }}">
            <a href="{{ route('admin.leaders.index') }}" class="nav-link">
                <i data-feather="loader"></i>
                <span class="link-title">{{ __('Для руководителя') }}</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.it.*') ? 'active' : '' }}">
            <a href="{{ route('admin.it.index') }}" class="nav-link">
                <i data-feather="loader"></i>
                <span class="link-title">{{ __('Для IT') }}</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.marketology.*') ? 'active' : '' }}">
            <a href="{{ route('admin.marketology.index') }}" class="nav-link">
                <i data-feather="loader"></i>
                <span class="link-title">{{ __('Для маркетолога') }}</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.feedback.*') ? 'active' : '' }}">
            <a href="{{ route('admin.feedback.index') }}" class="nav-link">
                <i data-feather="loader"></i>
                <span class="link-title">{{ __('Отзывы клиентов') }}</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.partners.*') ? 'active' : '' }}">
            <a href="{{ route('admin.partners.index') }}" class="nav-link">
                <i data-feather="loader"></i>
                <span class="link-title">{{ __('Наши клиенты') }}</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.recommendations.*') ? 'active' : '' }}">
            <a href="{{ route('admin.recommendations.index') }}" class="nav-link">
                <i data-feather="loader"></i>
                <span class="link-title">{{ __('Рекомендации') }}</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.menus.*') ? 'active' : '' }}">
            <a href="{{ route('admin.menus.index') }}" class="nav-link">
                <i data-feather="loader"></i>
                <span class="link-title">{{ __('Меню') }}</span>
            </a>
        </li>
        <li class="nav-item nav-category">{{ __('Языки') }}</li>
        <li class="nav-item {{ request()->routeIs('admin.localizations.*') ? 'active' : '' }}">
            <a href="{{ route('admin.localizations.index') }}" class="nav-link">
              <i data-feather="slack"></i>
              <span class="link-title">{{ __('Языки') }}</span>
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
