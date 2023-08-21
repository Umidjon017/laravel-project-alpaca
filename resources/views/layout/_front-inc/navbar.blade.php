<!-- Navbar Start -->
<div class="continer">
    <!-- Navbar Mobile Start-->
    <div class="navbar__mobile">
        <div class="logo__mobile">
            <img src="{{ asset('front/assets/logo.svg') }}" alt="">
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
                <img src="{{ asset('front/assets/logo.svg') }}" alt="">
                <button class="menu__btn burger__close">
                    <img src="{{ asset('front/assets/image/hero/close.png') }}" alt="">
                </button>
            </div>
            <ul class="nav">
                <li class="nav__li nav__dropdown">
            <span class="nav__dropdown__open">
              Пользователи
              <img src="{{ asset('front/assets/image/arrows/arrow_bottom.png') }}" alt="">
            </span>
                    <ul class="nav__dropdown__menu">
                        <li><a href="#">Частная практика</a></li>
                        <li><a href="#">Outpatient clinic</a></li>
                        <li><a href="#">Chain of clinics</a></li>
                    </ul>
                </li>
                <li class="nav__li nav__dropdown">
            <span class="nav__dropdown__open">
              Клиники
              <img src="{{ asset('front/assets/image/arrows/arrow_bottom.png') }}" alt="">
            </span>
                    <ul class="nav__dropdown__menu">
                        <li><a href="#">Частная практика</a></li>
                        <li><a href="#">Outpatient clinic</a></li>
                        <li><a href="#">Chain of clinics</a></li>
                        <li><a href="#">Hospital</a></li>
                        <li><a href="#">Hospital group</a></li>
                    </ul>
                </li>
                <li class="nav__li"><a href="#">Модули</a></li>
                <li class="nav__li"><a href="#">Цены</a></li>
                <li class="nav__li"><a href="#">О нас</a></li>
            </ul>
            <div class="demo">
                <button>Запросить демо версию</button>
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
