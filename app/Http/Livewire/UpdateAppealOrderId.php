<?php

namespace App\Http\Livewire;

use App\Models\Admin\Appeal;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UpdateAppealOrderId extends Component
{
    public $appeal;
    public $appealOrderId;

    public function mount($id)
    {
        $this->appeal=Appeal::where('page_id', $id)->first();
        if (! empty($this->appeal)) {
            $this->appealOrderId=$this->appeal->order_id;
        }
    }

    public function render(): View
    {
        if(! empty($this->appealOrderId)){
            Appeal::where('page_id', $this->appeal->page_id)->update(['order_id'=>$this->appealOrderId]);
        }

        return view('livewire.update-appeal-order-id');
    }
}
