{{-- Checkbox Block --}}
@isset($checkboxBlock)
    <div class="mb-3">
        <input wire:model="checkboxBlockOrderId" type="number" name="order_id" class="form-control" placeholder="New Order ID">
    </div>
@endisset
