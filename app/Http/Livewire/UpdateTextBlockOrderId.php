<?php

namespace App\Http\Livewire;

use App\Models\Admin\TextBlock;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UpdateTextBlockOrderId extends Component
{
    public $textBlock;
    public $textBlockOrderId;

    public function mount($id)
    {
        $this->textBlock=TextBlock::where('page_id', $id)->first();
        if (! empty($this->textBlock)) {
            $this->textBlockOrderId=$this->textBlock->order_id;
        }
    }

    public function render(): View
    {
        if(! empty($this->textBlockOrderId)){
            TextBlock::where('page_id', $this->textBlock->page_id)->update(['order_id'=>$this->textBlockOrderId]);
        }

        return view('livewire.update-text-block-order-id');
    }
}
