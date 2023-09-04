{{-- Appeal Block --}}
@isset($appeal)
    <div class="mb-3">
        <input wire:model="appealOrderId" type="number" name="order_id" class="form-control" placeholder="New Order ID">
    </div>
@endisset
