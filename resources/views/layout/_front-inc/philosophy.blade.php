<!-- Filasofiya Start -->
<div class="filasofiya">
    @foreach($ourPhilosophy as $philosophy)
        @php
            $items = explode(',', $philosophy->translatable()->additional);
        @endphp
    <p class="filasofiya__title">
        {!! nl2br(strip_tags($philosophy->translatable()->title)) !!}
    </p>
    <p class="filasofiya__subtitle">
        {!! nl2br(strip_tags($philosophy->translatable()->description)) !!}
    </p>
    <a href="{{ $philosophy->link }}" class="filasofiya__btn">{{ $philosophy->translatable()->link_title }}</a>
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
