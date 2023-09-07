<?php

namespace App\Http\Livewire;

use App\Models\Admin\Appeal;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AppealFormButton extends Component
{
    public $email;
    public $name;
    public $text;
    public array|object $appeal;

    public function mount()
    {
        $this->appeal = Appeal::with('translations')->first();
    }

    protected $rules = [
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

        $this->reset();
    }

    public function render(): View
    {
        return view('livewire.appeal-form-button');
    }
}
