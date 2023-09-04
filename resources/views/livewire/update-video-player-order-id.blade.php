{{-- Video Player Block --}}
@isset($videoPlayer)
    <div class="mb-3">
        <input wire:model="videoPlayerOrderId" type="number" name="order_id" class="form-control" placeholder="New Order ID">
    </div>
@endisset
