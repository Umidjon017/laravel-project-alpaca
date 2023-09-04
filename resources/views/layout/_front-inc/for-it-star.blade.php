<!-- For IT Start -->
<div class="for__card for1">
    @foreach($its as $it)
    <div class="for1__left">
        <p class="for__title f3">{!! $it->translatable()->title !!}</p>
        <p class="for__subtitle">
            {!! $it->translatable()->description !!}
        </p>
        <a href="{{ $it->link }}" class="for1__btn">{{ $it->translatable()->link_title }}</a>
    </div>
    <div class="for1__left_img">
        <img src="{{asset(it_file_path() . $it->image )}}" alt="">
    </div>
    <div class="for1__right">
        {!! $it->translatable()->body !!}
    </div>
    @endforeach
</div>
<!-- For IT End -->
