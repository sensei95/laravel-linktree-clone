<?php

namespace App\Http\Livewire\Components\Link;

use App\Models\Link;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddLinkForm extends Component
{
    use WithFileUploads;

    public bool $showForm = false;

    public $name;
    public $link;
    public $active = false;
    public $thumbnail;

    public $rules = [
        'name' => 'required|string|max:255',
        'link' => 'required|url',
        'active' => 'nullable',
        'thumbnail' => 'nullable|image|max:1024'
    ];


    public function toggleShowForm(): void
    {
        $this->showForm = !$this->showForm;
    }


    public function save()
    {
        $this->validate();

        Auth::user()->links()->create([
            'name' => $this->name,
            'link' => $this->link,
            'active' => $this->active
        ]);

        if ($this->thumbnail) {
            $this->thumbnail->storePublicly('thumnals');
        }

        $this->emitUp('refresh-links');

        $this->resetValues();

        $this->toggleShowForm();
    }

    public function resetValues(): void
    {
        $this->name = '';
        $this->link = '';
        $this->active = false;
    }

    public function render()
    {
        return view('livewire.components.link.add-link-form');
    }
}
