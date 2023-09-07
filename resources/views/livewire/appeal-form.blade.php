<div class="p-6">
    @php
        $disabled = $errors->any() || empty($this->name) || empty($this->email);
    @endphp
    <section class="w-1/2 p-6 mx-auto space-y-6 shadow">
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
    </section>
</div>
