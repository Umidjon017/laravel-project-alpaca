<!-- For Marketology Start -->
<div class="for__card for2">
    @foreach($marketologies as $marketology)
    <div class="for2__left">
        {!! $marketology->translatable()->body !!}
    </div>
    <div class="for2__right">
        <p class="for__title f4">{!! $marketology->translatable()->title !!}</p>
        <p class="for__subtitle">
            {!! $marketology->translatable()->description !!}
        </p>
        <a href="{{ $marketology->link }}" class="for2__btn">{{ $marketology->translatable()->link_title }}</a>
    </div>
    <div class="for2__right_img">
        <img src="{{ asset(marketology_file_path() . $marketology->image) }}" alt="">
    </div>
    @endforeach
</div>
<!-- For Marketology End -->
