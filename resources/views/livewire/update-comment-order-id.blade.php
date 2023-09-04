{{-- Comment Block --}}
@isset($commentBlock)
    <div class="mb-3">
        <input wire:model="commentBlockOrderId" type="number" name="order_id" class="form-control" placeholder="New Order ID">
    </div>
@endisset
