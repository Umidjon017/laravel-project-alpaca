@push('custom-css')
<style>
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 1;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        position: relative;
        width: 27%;
        margin: 10% auto;
    }

    .close {
        position: absolute;
        top: 5px;
        right: 5px;
        padding: 10px;
        cursor: pointer;
        border-radius: 15px;
        background: var(--primary-blue, #092D46);
        height: 7%;
        width: 8%;
        color: var(--white, #FFF);
        font-family: Inter;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        line-height: 18px;
        outline: none;
        border: none;
        margin-bottom: 10px;
        text-align: center;
    }

    .form__title {
        color: var(--black, #1F2128);
        text-align: center;
        font-family: Inter;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        line-height: 30px;
        margin-bottom: 30px;
    }
</style>
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
                <button type="button" id="myButton" onclick="openModal()">
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
    <script>
        // Get references to the modal and close button
        const modal = document.getElementById('myModal');
        const closeButton = document.querySelector('.close');

        // Function to open the modal
        function openModal() {
            modal.style.display = 'block';
        }

        // Function to close the modal
        function closeModal() {
            modal.style.display = 'none';
        }

        // Event listeners
        closeButton.addEventListener('click', closeModal);
        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                closeModal();
            }
        });
    </script>
@endpush
