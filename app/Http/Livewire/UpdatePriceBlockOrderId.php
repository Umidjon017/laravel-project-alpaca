<?php

namespace App\Http\Livewire;

use App\Models\Admin\PriceBlock;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UpdatePriceBlockOrderId extends Component
{
    public $priceBlock;
    public $priceBlockOrderId;

    public function mount($id)
    {
        $this->priceBlock=PriceBlock::where('page_id', $id)->first();
        if (! empty($this->priceBlock)) {
            $this->priceBlockOrderId=$this->priceBlock->order_id;
        }
    }

    public function render(): View
    {
        if(! empty($this->priceBlockOrderId)){
            PriceBlock::where('page_id', $this->priceBlock->page_id)->update(['order_id'=>$this->priceBlockOrderId]);
        }

        return view('livewire.update-price-block-order-id');
    }
}
