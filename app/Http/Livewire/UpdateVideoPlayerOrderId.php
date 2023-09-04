<?php

namespace App\Http\Livewire;

use App\Models\Admin\VideoPlayer;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UpdateVideoPlayerOrderId extends Component
{
    public $videoPlayer;
    public $videoPlayerOrderId;

    public function mount($id)
    {
        $this->videoPlayer=VideoPlayer::where('page_id', $id)->first();
        if (! empty($this->videoPlayer)) {
            $this->videoPlayerOrderId=$this->videoPlayer->order_id;
        }
    }

    public function render(): View
    {
        if(! empty($this->videoPlayerOrderId)){
            VideoPlayer::where('page_id', $this->videoPlayer->id)->update(['order_id'=>$this->videoPlayerOrderId]);
        }

        return view('livewire.update-video-player-order-id');
    }
}
