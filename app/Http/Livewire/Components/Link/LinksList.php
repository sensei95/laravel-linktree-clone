<?php

namespace App\Http\Livewire\Components\Link;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LinksList extends Component
{
    public $links;

    public $listeners = [
        'refresh-links' => 'refreshList'
    ];


    public function mount()
    {
        $this->fetchLinks();
    }

    public function fetchLinks()
    {
        $this->links =  Auth::user()->links()->orderBy('created_at', 'desc')->get();
    }

    public function refreshList()
    {
        $this->fetchLinks();
    }

    public function render()
    {
        return view('livewire.components.link.links-list');
    }
}
