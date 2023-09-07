<div class="contact__form">
@php
    $disabled = $errors->any() || empty($this->name) || empty($this->email);
@endphp

    {{-- Alert --}}
    <x-alerts.message />

    <form wire:submit.prevent="store" class="space-y-6">
        {{-- Email --}}
        <div class="mb-3">
            <input wire:model.debounce.300ms="email" type="email" class="form-control" name="email" placeholder="{!! $appeal->translatable()->email !!}" />
            <div class="text-danger">
                @error('email') <span style="color: red" class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- Name --}}
        <div class="mb-3">
            <input wire:model.debounce.300ms="name" type="text" name="name" class="form-control" placeholder="{!! $appeal->translatable()->name !!}" />
            <div class="text-danger">
                @error('name') <span style="color: red" class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- Textarea --}}
        <div class="mb-3">
            <textarea wire:model.debounce.300ms="text" class="form-control" name="text" rows="4" placeholder="{!! $appeal->translatable()->comment !!}"> </textarea>
            <div class="text-danger">
                @error('text') <span style="color: red" class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- Submit --}}
        <x-buttons.primary wire:target="store" type="submit" :disabled="$disabled">
            {!! $appeal->translatable()->link !!}
        </x-buttons.primary>
    </form>

</div>

<div class="my__modal">
    <div class="modal__close"></div>
    <div class="modal__container">
        <div class="modal__close__x">
            <span></span>
            <span></span>
        </div>
        <div class="contact__form">
            <p class="form__title">Оставьте заявку прямо сейчас</p>
            <form action="">
                <input type="email" placeholder="Электронная почта">
                <input type="text" placeholder="Имя">
                <textarea cols="30" rows="10" placeholder="Комментарий"></textarea>
                <button>Попробовать бесплатно</button>
            </form>
            <p class="form__text">
                Нажимая на эту кнопку,
                <a href="#">Вы даете согласие на обработку своих персональных данных</a>
            </p>
            <p class="form__text">
                и соглашаетесь с
                <a href="">Политикой обработки персональных данных</a>
            </p>
        </div>
    </div>
</div>
