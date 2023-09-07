<?php

namespace App\Http\Livewire;

use App\Models\Admin\Appeal;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AppealForm extends Component
{
    public string $email;
    public string $name;
    public string $text;
    public array|object $appeal;

    public function mount($page_id)
    {
        $this->appeal = Appeal::where('page_id', $page_id)->with('translations')->first();
    }

    protected array $rules = [
        'email' => 'required|email',
        'name' => 'required|min:3',
        'text'  => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $validated = $this->validate();

        \App\Models\Admin\AppealForm::create($validated);

        session()->flash('success', 'Спасибо, Ваша заявка принята !');
    }

    public function render(): View
    {
        return view('livewire.appeal-form');
    }
}
