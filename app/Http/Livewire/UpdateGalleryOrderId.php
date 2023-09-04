<?php

namespace App\Http\Livewire;

use App\Models\Admin\Gallery;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UpdateGalleryOrderId extends Component
{
    public $gallery;
    public $galleryOrderId;

    public function mount($id)
    {
        $this->gallery=Gallery::where('page_id', $id)->first();
        if (! empty($this->gallery)) {
            $this->galleryOrderId=$this->gallery->order_id;
        }
    }

    public function render(): View
    {
        if(! empty($this->galleryOrderId)){
            Gallery::where('page_id', $this->gallery->id)->update(['order_id'=>$this->galleryOrderId]);
        }

        return view('livewire.update-gallery-order-id');
    }
}
