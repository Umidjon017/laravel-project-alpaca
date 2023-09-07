{{-- Banner Block --}}
@isset($bannerBlock)
    <div class="mb-3">
        <input wire:model="bannerBlockOrderId" type="number" name="order_id" class="form-control" placeholder="New Order ID">
    </div>
@endisset
