{{-- Our Client Block --}}
@isset($ourClientBlock)
    <div class="mb-3">
        <input wire:model="ourClientBlockOrderId" type="number" name="order_id" class="form-control" placeholder="New Order ID">
    </div>
@endisset
