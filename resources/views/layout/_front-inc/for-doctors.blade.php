<!-- For Doctors Start -->
<div class="for__card for1 for__one">
    @foreach($doctors as $doctor)
    <div class="for1__left">
        <p class="for__title f1">{!! $doctor->getTranslatedAttributes(session('locale_id'))->title !!}</p>
        <p class="for__subtitle">
            {!! $doctor->getTranslatedAttributes(session('locale_id'))->description !!}
        </p>
        <a href="{{ $doctor->link }}" class="for1__btn">Подробнее</a>
    </div>
    <div class="for1__left_img">
        <img src="{{ asset(doctors_file_path() . $doctor->image) }}" alt="">
    </div>
    <div class="for1__right">
        {!! $doctor->getTranslatedAttributes(session('locale_id'))->body !!}
{{--        <div class="for__card__text">--}}
{{--            <b class="fc__text_b">Удобство и доступность</b>--}}
{{--            <p class="fc__text_p">--}}
{{--                удобный интерфейс и доступ к информации для врачей в любое время и место--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <div class="for__card__text">--}}
{{--            <b class="fc__text_b">Эффективное управление пациентами</b>--}}
{{--            <p class="fc__text_p">--}}
{{--                удобная система управления пациентами и просмотра медицинских данных для врачей--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <div class="for__card__text">--}}
{{--            <b class="fc__text_b">Автоматизация и оптимизация процессов</b>--}}
{{--            <p class="fc__text_p">--}}
{{--                автоматизация документации, освобождающая время для качественной медицинской помощи--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        <div class="for__card__text">--}}
{{--            <b class="fc__text_b">Обеспечение конфиденциальности </b>--}}
{{--            <p class="fc__text_p">--}}
{{--                система обеспечивает защиту персональных данных пациентов--}}
{{--            </p>--}}
{{--        </div>--}}
    </div>
    @endforeach
</div>
<!-- For Doctors End -->
