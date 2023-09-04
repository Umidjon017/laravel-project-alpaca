<?php

namespace App\Http\Livewire;

use App\Models\Admin\Comment;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UpdateCommentOrderId extends Component
{
    public $commentBlock;
    public $commentBlockOrderId;

    public function mount($id)
    {
        $this->commentBlock=Comment::where('page_id', $id)->first();
        if (! empty($this->commentBlock)) {
            $this->commentBlockOrderId=$this->commentBlock->order_id;
        }
    }

    public function render(): View
    {
        if(! empty($this->commentBlockOrderId)){
            Comment::where('page_id', $this->commentBlock->id)->update(['order_id'=>$this->commentBlockOrderId]);
        }

        return view('livewire.update-comment-order-id');
    }
}
