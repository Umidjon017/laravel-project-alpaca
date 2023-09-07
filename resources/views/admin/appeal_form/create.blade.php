<div class="my__modal">
    <div class="modal__close"></div>
    <div class="modal__container">
        <div class="modal__close__x">
            <span></span>
            <span></span>
        </div>

        <div class="contact__form">
            <p class="form__title">
                {{ app()->getLocale()==1 ? 'Оставьте заявку прямо сейчас' : 'Leave a request right now' }}
            </p>

            @livewire('appeal-form-button')

            @foreach($route->rules as $rule)
                <p class="form__text">
                    <a href="{{ asset(rules_file_path().$rule->file_personal_data) }}">{!! $rule->translatable()->agreement_personal_data !!}</a>
                </p> <br>

                <p class="form__text">
                    <a href="{{ asset(rules_file_path().$rule->file_personal_data_policy) }}">{!! $rule->translatable()->agreement_personal_data_policy !!}</a>
                </p>
            @endforeach
        </div>

    </div>
</div>
