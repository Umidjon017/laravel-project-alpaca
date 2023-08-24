<!-- Comments Start -->
<div class="comments__container">
    <p class="comments__title">Отзывы наших клиентов</p>
    <div class="comments">
        <div dir="ltr" class="swiper mySwiper">

            <div class="swiper-wrapper">
                @foreach($feedbacks as $feedback)
                <div class="swiper-slide">
                    <div class="comment">
                        <img src="{{asset(feedback_file_path() . $feedback->logo)}}" alt="" class="comment__logo">
                        <p class="comment__text">
                            {!! $feedback->getTranslatedAttributes(session('locale_id'))->text !!}
                        </p>
                        <div class="comment__user">
                            <img src="{{asset(feedback_file_path() . $feedback->image)}}" alt="">
                            <div class="comment__user__info">
                                <b class="comment__user__name">{!! $feedback->getTranslatedAttributes(session('locale_id'))->full_name !!}</b>
                                <p class="comment__user__company">{!! $feedback->getTranslatedAttributes(session('locale_id'))->position !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- <div class="swiper-pagination"></div> -->
        </div>
    </div>
</div>
<!-- Comments End -->
