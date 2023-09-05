<?php

namespace App\Http\Livewire;

use App\Models\Admin\RecommendationBlock;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UpdateRecommendationBlockOrderId extends Component
{
    public $recommendationBlock;
    public $recommendationBlockOrderId;

    public function mount($id)
    {
        $this->recommendationBlock=RecommendationBlock::where('page_id', $id)->first();
        if (! empty($this->recommendationBlock)) {
            $this->recommendationBlockOrderId=$this->recommendationBlock->order_id;
        }
    }

    public function render(): View
    {
        if(! empty($this->recommendationBlockOrderId)){
            RecommendationBlock::where('page_id', $this->recommendationBlock->page_id)->update(['order_id'=>$this->recommendationBlockOrderId]);
        }

        return view('livewire.update-recommendation-block-order-id');
    }
}
