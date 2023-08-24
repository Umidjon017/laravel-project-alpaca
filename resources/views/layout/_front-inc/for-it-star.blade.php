<!-- For IT Start -->
<div class="for__card for1">
    @foreach($its as $it)
    <div class="for1__left">
        <p class="for__title f3">{!! $it->getTranslatedAttributes(session('locale_id'))->title !!}</p>
        <p class="for__subtitle">
            {!! $it->getTranslatedAttributes(session('locale_id'))->description !!}
        </p>
        <a href="{{ $it->link }}" class="for1__btn">Подробнее</a>
    </div>
    <div class="for1__left_img">
        <img src="{{asset(it_file_path() . $it->image )}}" alt="">
    </div>
    <div class="for1__right">
        {!! $it->getTranslatedAttributes(session('locale_id'))->body !!}
{{--        <div class="for__card__text">--}}
{{--            <b class="fc__text_b">Универсальность и гибкость</b>--}}
{{--            <p class="fc__text_p">--}}
{{--                возможность создания пользовательских решений, специализированныхдля конкретных медицинских организаций--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <div class="for__card__text">--}}
{{--            <b class="fc__text_b">Техническая поддержка</b>--}}
{{--            <p class="fc__text_p">--}}
{{--                обеспечиваем техническую поддержкуи регулярные обновления системы--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <div class="for__card__text">--}}
{{--            <b class="fc__text_b">Пользовательский опыт</b>--}}
{{--            <p class="fc__text_p">--}}
{{--                возможность создавать удобныеи функциональные решениядля медицинского персонала и пациентов--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <div class="for__card__text">--}}
{{--            <b class="fc__text_b">Экономическая эффективность</b>--}}
{{--            <p class="fc__text_p">--}}
{{--                использование нашей операционной системы позволяет сократить времяи затраты на разработку собственного решения--}}
{{--            </p>--}}
{{--        </div>--}}
    </div>
    @endforeach
</div>
<!-- For IT End -->
