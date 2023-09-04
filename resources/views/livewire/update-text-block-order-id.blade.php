{{-- Text Block --}}
@isset($textBlock)
    <div class="mb-3">
        <input wire:model="textBlockOrderId" type="number" name="order_id" class="form-control" placeholder="New Order ID">
    </div>
@endisset
