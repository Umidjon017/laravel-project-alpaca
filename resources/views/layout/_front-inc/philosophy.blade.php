<!-- Filasofiya Start -->
<div class="filasofiya">
    @foreach($ourPhilosophy as $philosophy)
        @php
            $items = explode(',', $philosophy->translatable()->additional);
        @endphp
    <p class="filasofiya__title">
        {{ $philosophy->translatable()->title }}
    </p>
    <p class="filasofiya__subtitle">
        {{ $philosophy->translatable()->description }}
    </p>
    <a href="{{ $philosophy->link }}" class="filasofiya__btn">Узнать подробнее</a>
    <div class="filasofiya__items">
        @php
            $icons = explode(',', $philosophy->icon);
            $iconCount = count($icons);
        @endphp
        @foreach($items as $index => $item)
            <div class="f__item">
                <img src="{{ asset(philosophy_file_path() . $icons[$index % $iconCount]) }}" alt="">
                <p>{{ $item }}</p>
            </div>
        @endforeach
    </div>
    @endforeach
</div>
<!-- Filasofiya End -->
