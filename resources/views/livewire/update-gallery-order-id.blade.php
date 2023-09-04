{{-- Gallery Block --}}
@isset($galleryOrderId)
    <div class="mb-3">
        <input wire:model="galleryOrderId" type="number" name="order_id" class="form-control" placeholder="New Order ID">
    </div>
@endisset
