<!-- For Marketology Start -->
<div class="for__card for2">
    @foreach($marketologies as $marketology)
    <div class="for2__left">
        {!! $marketology->getTranslatedAttributes(session('locale_id'))->body !!}
{{--        <div class="for__card__text">--}}
{{--            <b class="fc__text_b">Централизованная система статистики</b>--}}
{{--            <p class="fc__text_p">--}}
{{--                предоставляет доступк данным для анализа рынка и принятия маркетинговых решений.--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <div class="for__card__text">--}}
{{--            <b class="fc__text_b">Финансовые отчеты</b>--}}
{{--            <p class="fc__text_p">--}}
{{--                обеспечиваем контроль бюджета и оптимизацию маркетинговых кампаний--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <div class="for__card__text">--}}
{{--            <b class="fc__text_b">Упрощенный доступ к информации</b>--}}
{{--            <p class="fc__text_p">--}}
{{--                доступ к информациии аналитическим отчетам для анализа рынкаи маркетинговых кампаний.--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <div class="for__card__text">--}}
{{--            <b class="fc__text_b">Надежность и безопасность</b>--}}
{{--            <p class="fc__text_p">--}}
{{--                широкий набор инструментов аналитики для оптимизации склада, персонала и маркетинговой аналитики от сайта до LTV--}}
{{--            </p>--}}
{{--        </div>--}}
    </div>
    <div class="for2__right">
        <p class="for__title f4">{!! $marketology->getTranslatedAttributes(session('locale_id'))->title !!}</p>
        <p class="for__subtitle">
            {!! $marketology->getTranslatedAttributes(session('locale_id'))->description !!}
        </p>
        <a href="{{ $marketology->link }}" class="for2__btn">Подробнее</a>
    </div>
    <div class="for2__right_img">
        <img src="{{ asset(marketology_file_path() . $marketology->image) }}" alt="">
    </div>
    @endforeach
</div>
<!-- For Marketology End -->
