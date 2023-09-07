<div class="modal-content">
    <div class="contact__form">
    @php
        $disabled = $errors->any() || empty($this->name) || empty($this->email);
    @endphp

        {{-- Alert --}}
        <x-alerts.message />

        <p class="form__title">
            {{ app()->getLocale()==1 ? 'Оставьте заявку прямо сейчас' : 'Leave a request right now' }}
        </p>

        <p class="close">&times;</p>

        <form wire:submit.prevent="store" class="space-y-6">
            {{-- Email --}}
            <div class="mb-3">
                <input wire:model.debounce.300ms="email" type="email" class="form-control" name="email" placeholder="Введите Электронная почта" />
                <div class="text-danger">
                    @error('email') <span style="color: red" class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Name --}}
            <div class="mb-3">
                <input wire:model.debounce.300ms="name" type="text" name="name" class="form-control" placeholder="Введите Имя" />
                <div class="text-danger">
                    @error('name') <span style="color: red" class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Textarea --}}
            <div class="mb-3">
                <textarea wire:model.debounce.300ms="text" class="form-control" name="text" rows="4" placeholder="Введите Ваше сообщение"> </textarea>
                <div class="text-danger">
                    @error('text') <span style="color: red" class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Submit --}}
            <x-buttons.primary wire:target="store" type="submit" :disabled="$disabled">
                {{ __('Попробовать бесплатно') }}
            </x-buttons.primary>
        </form>

    </div>
</div>
