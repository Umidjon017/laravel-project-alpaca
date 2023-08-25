<!-- Hero Start -->
<div class="hero__container">
    <div class="container">
        <div class="hero">
            @foreach($banners as $banner)
            <div class="hero__text">
                    <h1 class="hero__title">
                        {!! preg_replace('/медицинского/i', '<span>медицинского</span>', $banner->translatable()->title) !!}
                    </h1>
                    <p>
                        {!! preg_replace('/К слову, alpaca - это не лама!/i', '<b>К слову, alpaca - это не лама!</b>', $banner->translatable()->description) !!}
                    </p>
                <div class="hero__btn">
                    <a href="#">Попробовать бесплатно</a>
                    <a href="{{ $banner->link }}">Узнать больше</a>
                </div>
            </div>
            <div class="hero__img">
                <img src="{{asset(banner_file_path() . $banner->image)}}" alt="">
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Hero End -->
