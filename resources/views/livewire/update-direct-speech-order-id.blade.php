{{-- Direct Speech Block --}}
@isset($directSpeech)
    <div class="mb-3">
        <input wire:model="directSpeechOrderId" type="number" name="order_id" class="form-control" placeholder="New Order ID">
    </div>
@endisset
