<!-- Filasofiya Start -->
<div class="filasofiya">
    @foreach($ourPhilosophy as $philosophy)
        @php
            $items = explode(',', $philosophy->getTranslatedAttributes(session('locale_id'))->additional);
        @endphp
    <p class="filasofiya__title">
        {{ $philosophy->getTranslatedAttributes(session('locale_id'))->title }}
    </p>
    <p class="filasofiya__subtitle">
        {{ $philosophy->getTranslatedAttributes(session('locale_id'))->description }}
    </p>
    <a href="{{ $philosophy->link }}" class="filasofiya__btn">Узнать подробнее</a>
    <div class="filasofiya__items">
        @php
            $icons = explode(',', $philosophy->icon)
        @endphp
        @foreach($items as $item)
            <div class="f__item">
                @foreach($icons as $icon)
                    <img src="{{ asset(philosophy_file_path() . $icon) }}" alt="">
                    <p>{{ $item }}</p>
                @endforeach
            </div>
        @endforeach
{{--        <div class="f__item">--}}
{{--            <img src="{{ asset('front/assets/image/stars/star3.png') }}" alt="">--}}
{{--            <p>Наш залог - наилучший опыт для пациентов </p>--}}
{{--        </div>--}}
{{--        <div class="f__item">--}}
{{--            <img src="{{ asset('front/assets/image/stars/star2.png') }}" alt="">--}}
{{--            <p>Предоставляем инструментарий для эффективного управления</p>--}}
{{--        </div>--}}
{{--        <div class="f__item">--}}
{{--            <img src="{{ asset('front/assets/image/stars/star3.png') }}" alt="">--}}
{{--            <p>Используем самую современную архитектуру с защитой по умолчанию</p>--}}
{{--        </div>--}}
    </div>
    @endforeach
</div>
<!-- Filasofiya End -->
