{{-- Recommendation Block --}}
@isset($recommendationBlock)
    <div class="mb-3">
        <input wire:model="recommendationBlockOrderId" type="number" name="order_id" class="form-control" placeholder="New Order ID">
    </div>
@endisset
