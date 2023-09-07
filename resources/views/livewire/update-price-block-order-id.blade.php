{{-- Price Block --}}
@isset($priceBlock)
    <div class="mb-3">
        <input wire:model="priceBlockOrderId" type="number" name="order_id" class="form-control" placeholder="New Order ID">
    </div>
@endisset
