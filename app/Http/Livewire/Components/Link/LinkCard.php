<?php

namespace App\Http\Livewire\Components\Link;

use App\Models\Link;
use Livewire\Component;

class LinkCard extends Component
{
    public Link $link;
    public array $editing = [
      'name' => false,
      'link' => false
    ];
    public $rules = [
        'link.name' => 'required|string',
        'link.link' => 'required|string|url',
        'link.active' => 'nullable'
    ];

    public function mount(Link $link): void
    {
        $this->link = $link;
    }

    public function toggleEditing(string $field)
    {
        $this->editing[$field] = !$this->editing[$field];
    }

    public function delete()
    {
        $this->link->refresh()->delete();
        $this->emit('refresh-links');
    }

    public function save()
    {
        $this->validate();
        $this->link->save();
        $this->editing['name'] = false;
        $this->editing['link'] = false;
    }

    public function render()
    {
        return view('livewire.components.link.link-card');
    }
}
