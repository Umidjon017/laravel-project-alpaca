<!-- For Leader Start -->
<div class="for__card for2">
    @foreach($leaders as $leader)
    <div class="for2__left">
        {!! $leader->getTranslatedAttributes(session('locale_id'))->body !!}
{{--        <div class="for__card__text">--}}
{{--            <b class="fc__text_b">Повышенная эффективность управления</b>--}}
{{--            <p class="fc__text_p">--}}
{{--                помогает в повышении эффективности и контроля в управлении медицинскими учреждениями--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <div class="for__card__text">--}}
{{--            <b class="fc__text_b">Интеграция информации</b>--}}
{{--            <p class="fc__text_p">--}}
{{--                объединяет все аспекты медицинского бизнеса для более эффективного управления и принятия решений--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <div class="for__card__text">--}}
{{--            <b class="fc__text_b">Автоматизация рутинных задач</b>--}}
{{--            <p class="fc__text_p">--}}
{{--                автоматизирует рутинные задачи, чтобы руководители могли сконцентрироваться на стратегическом руководстве--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <div class="for__card__text">--}}
{{--            <b class="fc__text_b">Удобный доступ к информации</b>--}}
{{--            <p class="fc__text_p">--}}
{{--                обеспечивает мобильный доступ к информации о бизнесе, вне зависимостиот местоположения руководителя--}}
{{--            </p>--}}
{{--        </div>--}}
    </div>
    <div class="for2__right">
        <p class="for__title f2"> {!! $leader->getTranslatedAttributes(session('locale_id'))->title !!} </p>
        <p class="for__subtitle">
            {!! $leader->getTranslatedAttributes(session('locale_id'))->description !!}
        </p>
        <a href="{{ $leader->link }}" class="for2__btn">Подробнее</a>
    </div>
    <div class="for2__right_img">
        <img src="{{asset(leaders_file_path() . $leader->image)}}" alt="">
    </div>
    @endforeach
</div>
<!-- For Leader End -->
