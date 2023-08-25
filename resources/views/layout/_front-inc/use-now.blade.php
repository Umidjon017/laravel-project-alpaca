<!-- use_now Start -->
<div class="use__now">
    @foreach($recommendations as $recommendation)
    <div class="use__now__text">
        <p class="use__now__title">
            {!! $recommendation->translatable()->title !!}
        </p>
        <p class="use__now__subtitle">
            {!! $recommendation->translatable()->description !!}
        </p>
        <a href="{{ $recommendation->link }}" class="use__now__btn">
            Попробовать бесплатно
        </a>
    </div>
    <div class="use__now__img">
        <img src="{{asset('front/assets/image/end.png')}}" alt="">
    </div>
    @endforeach
</div>
<!-- use_now End -->
