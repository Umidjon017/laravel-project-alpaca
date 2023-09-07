<?php

namespace App\Http\Livewire;

use App\Models\Admin\BannerBlock;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UpdateBannerBlockOrderId extends Component
{
    public $bannerBlock;
    public $bannerBlockOrderId;

    public function mount($id)
    {
        $this->bannerBlock=BannerBlock::where('page_id', $id)->first();
        if (! empty($this->bannerBlock)) {
            $this->bannerBlockOrderId=$this->bannerBlock->order_id;
        }
    }

    public function render(): View
    {
        if(! empty($this->bannerBlockOrderId)){
            BannerBlock::where('page_id', $this->bannerBlock->page_id)->update(['order_id'=>$this->bannerBlockOrderId]);
        }

        return view('livewire.update-banner-block-order-id');
    }
}
