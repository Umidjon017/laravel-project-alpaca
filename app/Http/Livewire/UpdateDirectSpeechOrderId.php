<?php

namespace App\Http\Livewire;

use App\Models\Admin\DirectSpeech;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UpdateDirectSpeechOrderId extends Component
{
    public $directSpeech;
    public $directSpeechOrderId;

    public function mount($id)
    {
        $this->directSpeech=DirectSpeech::where('page_id', $id)->first();
        if (! empty($this->directSpeech)) {
            $this->directSpeechOrderId=$this->directSpeech->order_id;
        }
    }

    public function render(): View
    {
        if(! empty($this->directSpeechOrderId)){
            DirectSpeech::where('page_id', $this->directSpeech->id)->update(['order_id'=>$this->directSpeechOrderId]);
        }

        return view('livewire.update-direct-speech-order-id');
    }
}
