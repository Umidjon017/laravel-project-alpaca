@push('custom-css')
    <link rel="stylesheet" href="{{ asset('front/style/css/modal.css') }}">
@endpush

<!-- Navbar Start -->
<div class="continer">
    <!-- Navbar Mobile Start-->
    <div class="navbar__mobile">
        <div class="logo__mobile">
            <a href="{{url('/')}}"><img src="{{ asset('front/assets/logo.svg') }}" alt=""></a>
        </div>
        <div class="mobile__btns">
            <a href="tel:+972 53-466-1653" class="menu__btn phone__btn">
                <img src="{{ asset('front/assets/image/hero/phone.png') }}" alt="">
            </a>
            <button class="menu__btn burger__btn">
                <img src="{{ asset('front/assets/image/hero/menu.png') }}" alt="">
            </button>
        </div>
    </div>
    <!-- Navbar Mobile End-->
    <div class="navbar__close"></div>
    <div class="navbar__fixed">
        <div class="navbar">
            <div class="logo">
                <a href="{{url('/')}}"><img src="{{ asset('front/assets/logo.svg') }}" alt=""></a>
                <button class="menu__btn burger__close">
                    <img src="{{ asset('front/assets/image/hero/close.png') }}" alt="">
                </button>
            </div>

            <ul class="nav">
            @foreach($menus as $menu)
                @foreach($menu->parent as $menuItem)
                    @if($menuItem->parent_id == 0)
                        @include('front.menus.submenu', ['item' => $menuItem])
                    @endif
                @endforeach
            @endforeach
            </ul>

            <div>
                @foreach(\Illuminate\Support\Facades\Cache::get('localizations') as $locale)
                    <a class="locales {{ app()->getLocale()==$locale->id ? 'active' : '' }} " href="/locale/{{ $locale->id }}">{{ strtoupper($locale->name) }} </a> &nbsp;
                @endforeach
            </div>

            <div class="demo">
                <button type="button" id="modal__btn">
                    {{ app()->getLocale()==1 ? 'Запросить демо версию' : 'Request Demo Version' }}
                </button>

                @include('admin.appeal_form.create')

                <div class="nev__contact">
                    <b>Контакты</b>
                    <a href="tel:+972 53-466-1653">+972 53-466-1653</a>
                    <a href="mailto:amastryukov@alpacamed.com">amastryukov@alpacamed.com</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->

@push('custom-js')
    <script src="{{ asset('front/js/modal.js') }}"></script>
@endpush
