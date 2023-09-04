<?php

namespace App\Http\Livewire;

use App\Models\Admin\CheckboxBlock;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UpdateCheckboxBlockOrderId extends Component
{
    public $checkboxBlock;
    public $checkboxBlockOrderId;

    public function mount($id)
    {
        $this->checkboxBlock=CheckboxBlock::where('page_id', $id)->first();
        if (! empty($this->checkboxBlock)) {
            $this->checkboxBlockOrderId=$this->checkboxBlock->order_id;
        }
    }

    public function render(): View
    {
        if(! empty($this->checkboxBlockOrderId)){
            CheckboxBlock::where('page_id', $this->checkboxBlock->id)->update(['order_id'=>$this->checkboxBlockOrderId]);
        }

        return view('livewire.update-checkbox-block-order-id');
    }
}
