<?php

namespace App\Http\Livewire;

use App\Models\Admin\OurClient;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UpdateOurClientOrderId extends Component
{
    public $ourClientBlock;
    public $ourClientBlockOrderId;

    public function mount($id)
    {
        $this->ourClientBlock=OurClient::where('page_id', $id)->first();
        if (! empty($this->ourClientBlock)) {
            $this->ourClientBlockOrderId=$this->ourClientBlock->order_id;
        }
    }

    public function render(): View
    {
        if(! empty($this->ourClientBlockOrderId)){
            OurClient::where('page_id', $this->ourClientBlock->page_id)->update(['order_id'=>$this->ourClientBlockOrderId]);
        }

        return view('livewire.update-our-client-order-id');
    }
}
