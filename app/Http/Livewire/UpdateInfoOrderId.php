<?php

namespace App\Http\Livewire;

use App\Models\Admin\InfoBlock;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UpdateInfoOrderId extends Component
{
    public $infoBlock;
    public $infoBlockOrderId;

    public function mount($id)
    {
        $this->infoBlock=InfoBlock::where('page_id', $id)->first();
        if (! empty($this->infoBlock)) {
            $this->infoBlockOrderId=$this->infoBlock->order_id;
        }
    }

    public function render(): View
    {
        if(! empty($this->infoBlockOrderId)){
            InfoBlock::where('page_id', $this->infoBlock->page_id)->update(['order_id'=>$this->infoBlockOrderId]);
        }

        return view('livewire.update-info-order-id');
    }
}
